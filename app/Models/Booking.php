<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    const UNPAID = 'unpaid';
    const PAID = 'paid';
    const ONGOING = 'ongoing';
    const FINISHED = 'finish';
    const DP = 'down-payment';

    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'tgl_kedatangan' => 'datetime:Y-m-d'
    ];


    public function paket()
    {
        return $this->belongsTo(Paket::class,'paket_id');
    }

    public function paketHarga()
    {
        return $this->belongsTo(PaketHarga::class,'paket_harga_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class,'booking_id');
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class,'bank_account_id');
    }

    public function jam()
    {
        return $this->belongsTo(Jam::class,'jam_id');
    }
}
