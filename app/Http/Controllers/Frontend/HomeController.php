<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $paket = Paket::query()
            ->with(['paketHarga','images'])
            ->where('is_active',true)
            ->get();
        // max_person sudah ada di Paket, tidak perlu dihitung dari PaketHarga
        return view('frontend.home_gsbaru',compact('paket'));
    }
}
