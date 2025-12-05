<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KonfigurasiRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "email_notifikasi" => ["required","email"],
            "nomor_telp" => ["required",'string'],
            "slogan" => ["required","string"],
            "deskripsi"   => ["required","string"],
        ];
    }


}
