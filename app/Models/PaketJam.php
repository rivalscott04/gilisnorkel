<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketJam extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'paket_jam';

    public function paket()
    {
        return $this->belongsTo(Paket::class,'paket_id');
    }

    public function jam()
    {
        return $this->belongsTo(Jam::class,'jam_id');
    }

}
