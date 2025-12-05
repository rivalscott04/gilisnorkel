<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketDetailController extends Controller
{
    public function index($paketId, Request $request)
    {
        $guides = Guide::all();
        $paket = Paket::query()
            ->with(['paketHarga','images','jam'])
            ->where('id',$paketId)
            ->first();
        
        // Ambil adults dan date dari query parameter jika ada (dari home page)
        $adults = $request->get('adults');
        $date = $request->get('date');
        
        return view('frontend.paket-detail',compact('guides','paket','adults','date'));
    }
}
