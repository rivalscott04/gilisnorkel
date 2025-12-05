<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __invoke()
    {
        $galleries = Gallery::query()->with('images')->get();
        return view('frontend.gallery',compact('galleries'));
    }
}
