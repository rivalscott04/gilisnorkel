<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "nomor" => ["required","unique:payments,nomor"],
            "booking_id" => ["required","exists:bookings,id"],
            "keterangan" => ["nullable","string"],
            "total_bayar" => ["required","numeric"],
            "tgl_bayar" => ["required","date_format:Y-m-d"],
            "user_id" => ["required","exists:users,id"],
            "is_uang_muka" => ["required","boolean"],
            "is_pelunasan" => ["required","boolean"],
            "guide_id" => ["required","exists:guides,id"],

        ];
    }

    protected function prepareForValidation()
    {
        $totalBayar = str_replace(",","",$this->total_bayar);
        return $this->merge([
            "total_bayar" => $totalBayar,
            "user_id" => auth()->id(),
            "is_uang_muka" => $this->tipe_pembayaran == "DP",
            "is_pelunasan" => $this->tipe_pembayaran == "LUNAS",
        ]);
    }

}
