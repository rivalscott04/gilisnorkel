<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __invoke()
    {
        $faqs = Faq::all();
        return view('frontend.faq',compact('faqs'));
    }
}
