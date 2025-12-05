<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketImage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function image()
    {
        return $this->belongsTo(Image::class,'image_id');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class,'paket_id');
    }
}
