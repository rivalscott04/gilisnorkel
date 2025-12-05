<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use App\Models\Paket;
use Illuminate\Http\Request;

class MorningPrivateController extends Controller
{
    public function __invoke()
    {
        $guides = Guide::all();
        $morningPrivate = Paket::query()
            ->with('paketHarga')
            ->whereRaw("nama like '%morning%private%'")
            ->first();
        return view('frontend.morning-private',compact('guides','morningPrivate'));
    }
}
