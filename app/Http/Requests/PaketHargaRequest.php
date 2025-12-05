<?php

namespace App\Http\Requests;

use App\Models\Paket;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaketHargaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "keterangan" => ["required","string"],
            "harga" => ["required",'numeric'],
        ];
    }


    protected function prepareForValidation()
    {
        // Extract angka dari keterangan (misal: "5 Participants" → 5)
        $keterangan = $this->keterangan ?? '';
        preg_match('/\d+/', $keterangan, $matches);
        $personCount = !empty($matches) ? (int) $matches[0] : 1;
        
        // Min person dan max person = angka yang diextract dari keterangan
        $minPerson = $personCount;
        $maxPerson = $personCount;
        
        return $this->merge([
            "harga" => str_replace(",","",$this->harga),
            "min_person" => $minPerson,
            "max_person" => $maxPerson,
        ]);
    }

}
