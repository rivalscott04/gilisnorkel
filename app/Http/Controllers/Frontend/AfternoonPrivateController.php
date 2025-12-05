<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use App\Models\Paket;
use Illuminate\Http\Request;

class AfternoonPrivateController extends Controller
{
    public function __invoke()
    {
        $guides = Guide::all();
        $afternoonPrivate = Paket::query()
            ->with('paketHarga')
            ->whereRaw("nama like '%after%private%'")
            ->first();
        return view('frontend.afternoon-private',compact('guides','afternoonPrivate'));
    }
}
