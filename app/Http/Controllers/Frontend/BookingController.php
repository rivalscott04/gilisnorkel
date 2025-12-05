<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Mail\InvoiceMail;
use App\Mail\InvoicePaidMail;
use App\Models\BankAccount;
use App\Models\Booking;
use App\Models\Jam;
use App\Models\Konfigurasi;
use App\Models\Paket;
use App\Models\Payment;
use App\Services\PaymentServices;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public $konfig;
    public function __construct( )
    {
        $this->konfig = Konfigurasi::query()->first();
    }

    public function index($selectedPaket = null, Request $request)
    {
        $paket = Paket::query()
            ->with(['paketHarga','jam'])
            ->where('is_active',true)
            ->get();
        $bankAccount = BankAccount::query()->where('is_active',true)->get();
//        $jam = Jam::query()
//            ->where('is_active',true)
//            ->get();

        // Ambil adults dan date dari query parameter (dari halaman home)
        $adults = $request->get('adults', 1);
        $date = $request->get('date');

        return view('frontend.booking',compact('paket','bankAccount','selectedPaket','adults','date'));
    }

    public function store(BookingRequest $request)
    {
        try {
            $booking = Booking::query()->create($request->validated());
            return redirect()->route('frontend.booking.success',$booking->nomor);
        }catch (\Exception $e){
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function successBooking(Booking $booking)
    {
        $booking->load(['paket', 'paketHarga', 'bankAccount']);
        $konfig = $this->konfig;
        
        // TODO: Uncomment when DOKU integration is ready
        // $paymentUrl = PaymentServices::createPaymentUrl($booking);
        // 
        // // Check if payment URL exists before sending email
        // $paymentUrlString = isset($paymentUrl["response_encode"]) 
        //     ? ($paymentUrl["response_encode"]->payment?->url ?? null)
        //     : null;
        // if ($paymentUrlString) {
        //     Mail::to($booking->email)
        //         ->cc($this->konfig->email_notifikasi)
        //         ->send(new InvoiceMail($booking, $paymentUrlString));
        // }
        
        // Temporary: set empty payment URL
        $paymentUrl = null;

        return view('frontend.booking-success',compact('booking','konfig','paymentUrl'));
    }

    public function paymentStatus(Booking $booking)
    {
        $booking->load(["payments", "paket", "paketHarga"]);
        $paymentStatus = PaymentServices::getPaymentStatus($booking);


        $response = collect($paymentStatus["response_encode"]);
        if(isset($response) && $response["transaction"]->status==="SUCCESS"){
            if($booking->payments->count() == 0) {
                DB::transaction(function () use ($booking, $response) {
                    Payment::query()->create([
                        "nomor" => time(),
                        "booking_id" => $booking->id,
                        "keterangan" => "DOKU PAYMENT",
                        "total_bayar" => $booking->harga,
                        "tgl_bayar" => Carbon::make($response["transaction"]->date)->format("Y-m-d H:i:s"),
                        "user_id" => 1,
                        "is_uang_muka" => false,
                        "is_pelunasan" => true,
                        "guide_id" => null,
                    ]);
                    $booking->update([
                        "status" => Booking::PAID,
                    ]);
                });
                Mail::to($booking->email)
                    ->cc($this->konfig->email_notifikasi)
                    ->send(new InvoicePaidMail($booking,$response));
            }

            return view('frontend.payment-success',compact('booking','response'));
        }

        return view("frontend.payment-failed",compact('booking','response'));

    }

    public function paymentNotification(Request $request)
    {
        $notification = PaymentServices::getNotification($request);
        if($notification !== false){
            $invoice = explode("-",$notification["order"]["invoice_number"]);
            $booking = Booking::query()->where("nomor",$invoice[1])->first();
            if($booking){
                DB::transaction(function ()  use ($booking,$notification){
                    Payment::query()->create([
                        "nomor" => time(),
                        "booking_id" => $booking->id,
                        "keterangan" => "DOKU PAYMENT",
                        "total_bayar" => $booking->harga,
                        "tgl_bayar" => Carbon::make($notification["transaction"]["date"])->format("Y-m-d H:i:s"),
                        "user_id" => 1,
                        "is_uang_muka" => false,
                        "is_pelunasan" => true,
                        "guide_id" => null,
                    ]);
                    $booking->update([
                        "status" => Booking::PAID,
                    ]);
                });
                return redirect()->route('booking.payment-status',$booking->nomor);
            }
            return  response()->json("",404);
        }

        return  response()->json("",404);

    }

}
