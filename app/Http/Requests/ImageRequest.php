<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "keterangan" => ["required","string"],
            "file_image" => ["required","mimes:jpg,png","max:1024"],
        ];
    }

}
