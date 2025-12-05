<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketHarga extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'paket_harga';

    public function paket()
    {
        return $this->belongsTo(Paket::class,'paket_id');
    }

    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class,'paket_harga_id');
    }

}
