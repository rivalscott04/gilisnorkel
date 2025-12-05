<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaketRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "nama" => ["required","string"],
            "hari" => ["required",'numeric','max_digits:4','min:1'],
            "max_person" => ["required","numeric","min:1"],
            "harga_per_person" => ["required","numeric","min:1"],
            "deskripsi"   => ["required","string"],
            "images" => ["required","array"],
            "is_active" => ["required","boolean"]
        ];
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            "harga_per_person" => str_replace(",","",$this->harga_per_person ?? ''),
        ]);
    }

}
