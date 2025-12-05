<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Paket extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = [];
    protected $table = 'paket';

    public function bookings()
    {
        return $this->hasMany(Booking::class,'paket_id');
    }

    public function paketHarga()
    {
        return $this->hasMany(PaketHarga::class,'paket_id')
            ->orderBy('harga');
    }

    public function paketJam()
    {
        return $this->hasMany(PaketJam::class,'paket_id');
    }

    public function jam()
    {
        return $this->belongsToMany(Jam::class,PaketJam::class,'paket_id','jam_id')
            ->withTimestamps();
    }

    public function paketImages()
    {
        return $this->hasMany(PaketImage::class,'paket_id');
    }

    public function images()
    {
        return $this->belongsToMany(Image::class,PaketImage::class,'paket_id','image_id')
            ->withTimestamps();
    }
}
