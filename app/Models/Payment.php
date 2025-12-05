<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Znck\Eloquent\Traits\BelongsToThrough;

class Payment extends Model
{

    use HasFactory,BelongsToThrough;
    protected $guarded = [];
    protected $casts = [
        'tgl_bayar' => 'datetime:Y-m-d'
    ];


    public function booking()
    {
        return $this->belongsTo(Booking::class,'booking_id');
    }

    public function paket()
    {
        return $this->belongsToThrough(Paket::class,Booking::class,null,
            '',
            [
                Booking::class => 'booking_id',
            ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function guide()
    {
        return $this->belongsTo(Guide::class,'guide_id');
    }

    public function scopeThisMonth($q)
    {

        return $q->whereMonth('tgl_bayar',now()->month)->whereYear('tgl_bayar',now()->year);
    }
}
