<?php

namespace App\Http\Requests;

use App\Models\Paket;
use App\Models\PaketHarga;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookingRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "nomor" => ["required","unique:bookings,nomor,".($this->booking->id??"")],
            "paket_id" => ["required","exists:paket,id"],
            "jam_id" => ["required","exists:jam,id"],
            "nama" => ["required","string"],
            "nomor_telp" => ["required","string","max:15"],
            "email" => ["required","email"],
            "harga" => ["required","numeric"],
            "tgl_kedatangan" => ["required","date_format:Y-m-d"],
            "paket_harga_id" => ["required","exists:paket_harga,id"],
            "bank_account_id"=> ["required","exists:bank_accounts,id"],
            "nationality" => ["required",Rule::in(config('nationalities'))],
            "adult" => ["required","integer","min:1"],

        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $adult = (int) $this->adult;
            $totalPerson = $adult;
            
            // Cek apakah request dari admin (route admin.booking.*)
            $isAdmin = $this->routeIs('admin.booking.*');

            if ($this->paket_id) {
                $paket = Paket::find($this->paket_id);
                
                if ($paket) {
                    $maxPersonPaket = $paket->max_person ?? 1;

                    if ($isAdmin) {
                        // Untuk admin booking: lebih fleksibel, cukup pastikan tidak melebihi max_person dari paket
                        // Admin bisa pilih jumlah person sesuai kebutuhan (dari 1 sampai max_person paket)
                        if ($totalPerson < 1) {
                            $validator->errors()->add(
                                'adult',
                                "Minimum 1 participant is required."
                            );
                        }

                        if ($totalPerson > $maxPersonPaket) {
                            $validator->errors()->add(
                                'adult',
                                "Maximum {$maxPersonPaket} participants allowed for this package."
                            );
                        }
                    } else {
                        // Untuk frontend booking: validasi berdasarkan paket_harga
                        if ($this->paket_harga_id) {
                            $paketHarga = PaketHarga::find($this->paket_harga_id);
                            
                            if ($paketHarga) {
                                $minPerson = $paketHarga->min_person ?? 1;
                                $maxPerson = $paketHarga->max_person;

                                // Jumlah person harus sama dengan min_person dari paket_harga yang dipilih
                                if ($totalPerson != $minPerson) {
                                    $validator->errors()->add(
                                        'paket_harga_id',
                                        "Number of participants ({$totalPerson}) does not match the selected option ({$minPerson} participants)."
                                    );
                                }

                                if ($totalPerson < $minPerson) {
                                    $validator->errors()->add(
                                        'adult',
                                        "Minimum {$minPerson} participant(s) required for this option."
                                    );
                                }

                                if ($maxPerson !== null && $totalPerson > $maxPerson) {
                                    $validator->errors()->add(
                                        'adult',
                                        "Maximum {$maxPerson} participant(s) allowed for this option."
                                    );
                                }
                            }
                        }
                    }
                }
            }

            // Validasi paket_harga_id untuk frontend (wajib)
            if (!$isAdmin && !$this->paket_harga_id) {
                $validator->errors()->add(
                    'paket_harga_id',
                    'Please select a participant option.'
                );
            }
        });
    }

    public function messages(): array
    {
        return [
            'nomor.required' => 'Unable to generate booking number. Please try again.',
            'nomor.unique' => 'This booking number already exists. Please try again.',

            'paket_id.required' => 'Please select a package.',
            'paket_id.exists' => 'The selected package is not available.',

            'jam_id.required' => 'Please select a starting time.',
            'jam_id.exists' => 'The selected starting time is not available.',

            'nama.required' => 'Please provide your full name.',

            'nomor_telp.required' => 'Please provide your phone number.',
            'nomor_telp.max' => 'Phone number cannot exceed 15 digits.',

            'email.required' => 'Please provide your email address.',
            'email.email' => 'Please enter a valid email address.',

            'tgl_kedatangan.required' => 'Please select your departure date.',
            'tgl_kedatangan.date_format' => 'Please select a valid departure date.',

            'bank_account_id.required' => 'Please select a payment method.',
            'bank_account_id.exists' => 'The selected payment method is not available.',

            'nationality.required' => 'Please select your nationality.',
            'nationality.in' => 'Please select a valid nationality from the list.',

            'adult.required' => 'Please enter the number of participants.',
            'adult.integer' => 'Please enter a valid number.',
            'adult.min' => 'Minimum 1 participant is required.',

            'paket_harga_id.required' => 'Please select a participant option.',
            'paket_harga_id.exists' => 'The selected participant option is not available.',
        ];
    }

    public function attributes(): array
    {
        return [
            'nama' => 'full name',
            'nomor_telp' => 'phone number',
            'tgl_kedatangan' => 'departure date',
            'paket_harga_id' => 'participants option',
            'bank_account_id' => 'payment method',
            'adult' => 'adults',
        ];
    }

    protected function prepareForValidation()
    {
        $normalizedPhone = preg_replace('/\D+/', '', (string) $this->nomor_telp);

        $this->merge([
            "harga" => str_replace(",","",$this->harga),
            "nomor_telp" => $normalizedPhone,
        ]);
    }

}
