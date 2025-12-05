<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Konfigurasi;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __invoke()
    {
        $konfig = Konfigurasi::query()->first();
        return view('frontend.contact',compact('konfig'));
    }
}
