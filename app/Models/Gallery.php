<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function images()
    {
        return $this->belongsToMany(Image::class,GalleryDetail::class,'gallery_id','image_id')
            ->withPivot(['id']);
    }

    public function galleryDetails()
    {
        return $this->hasMany(GalleryDetail::class,'gallery_id');
    }
}
