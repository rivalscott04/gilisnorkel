<?php

namespace App\Services;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PaymentServices
{
    public static string $paymentTargetPath = "/checkout/v2/payment";
    public static string $paymentNotificationPath = "/payments/notifications";
    public static string $checkStatusPaymentUrl = "/orders/v1/status/";

    public static function createPaymentUrl(Booking $booking) : array
    {
        $booking->load('paket');
        $targetPath = self::$paymentTargetPath;
        $prepareForRequest = self::prepareForRequest($booking,$targetPath);
        $url = config('doku.prod_endpoint').self::$paymentTargetPath;
        $paymentUrl = Http::withHeaders($prepareForRequest["header"])
            ->post($url,$prepareForRequest["body"]);

        return ["response" => $paymentUrl, "response_encode" => json_decode($paymentUrl->body())];
    }

    public static function getPaymentStatus(Booking $booking) : array
    {
        $booking->load('paket');
        $targetPath = self::$checkStatusPaymentUrl."INV-".$booking->nomor;
        $prepareForRequest = self::prepareForRequest($booking,$targetPath,'get');
        $url = config('doku.prod_endpoint').$targetPath;

        $paymentStatus = Http::withHeaders($prepareForRequest["header"])
            ->get($url);

        return ["response" => $paymentStatus, "response_encode" => json_decode($paymentStatus->body())];
    }

    public static function  getNotification(Request $request) {
        $notificationBody = $request->getContent();

        $digest = base64_encode(hash('sha256', $notificationBody, true));
        $rawSignature = "Client-Id:" . $request->header('Client-Id') . "\n"
            . "Request-Id:" . $request->header('Request-Id') . "\n"
            . "Request-Timestamp:" . $request->header('Request-Timestamp') . "\n"
            . "Request-Target:" . self::$paymentNotificationPath . "\n"
            . "Digest:" . $digest;

        $signature = base64_encode(hash_hmac('sha256', $rawSignature, config("doku.secret_key"), true));
        $finalSignature = 'HMACSHA256=' . $signature;

        return $finalSignature == $request->header('Signature') ? json_decode($notificationBody,true) : false;
    }

    private static function prepareForRequest(Booking $booking,$targetPath,$method = "post")
    {
        $requestId = Str::uuid()->toString();
        $requestDate = ($method=="get" ? now("UTC")->toISOString() : now("UTC")->toIso8601String());
        $requestBody = [
            'order' => [
                'amount' => $booking->harga,
                'invoice_number' => "INV-".$booking->nomor,
                'currency' => 'IDR',
                "auto_redirect" => true,
                'callback_url' => route('frontend.booking.payment-status',$booking->nomor),
                'callback_url_cancel' => route('frontend.booking.payment-status',$booking->nomor),
                'line_items' => [
                    [
                        "name"=> $booking->paket->nama, "quantity" => 1,"price" => $booking->harga
                    ]
                ]
            ],
            "payment" => [
                "payment_due_date" => 120
            ],
            "customer" => [
                'name' => $booking->nama,
                'email' => $booking->email,
            ],
        ];
        $digestValue = base64_encode(hash('sha256', json_encode($requestBody), true));

        $componentSignature = "Client-Id:" . config("doku.client_id") . "\n" .
            "Request-Id:" . $requestId . "\n" .
            "Request-Timestamp:" . $requestDate . "\n" .
            "Request-Target:" . $targetPath;

        if($method =="post")
            $componentSignature = $componentSignature. "\n" . "Digest:" . $digestValue;


        $signature = base64_encode(hash_hmac('sha256', $componentSignature, config("doku.secret_key"), true));
        $header = [
            "Client-Id" => config("doku.client_id"),
            "Request-Id" => $requestId,
            "Request-Timestamp" => $requestDate,
            "Signature" => "HMACSHA256=".$signature,
        ];

        return [
            "header" => $header ,
            "body" => $requestBody,
        ];
    }
}
