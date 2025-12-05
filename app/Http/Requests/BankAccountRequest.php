<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BankAccountRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "nama" => ["required","string"],
            "nomor" => ["required","string",'unique:bank_accounts,nomor'],
            "nama_account"   => ["required","string"],
            "is_active" => ["required","boolean"]
        ];
    }

}
