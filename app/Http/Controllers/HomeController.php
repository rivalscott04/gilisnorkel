<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Guide;
use App\Models\Payment;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $guide_count = Guide::query()->count();
        $unpaid_booking_count = Booking::query()
            ->where('status',Booking::UNPAID)
            ->count();

        $unpaid_booking_sum = Booking::query()
            ->where('status',Booking::UNPAID)
            ->sum('harga');

        $earning_thismonth = Payment::query()
            ->thisMonth()
            ->where('is_pelunasan',true)
            ->sum('total_bayar');

        return view('home',compact('guide_count','unpaid_booking_count','unpaid_booking_sum','earning_thismonth'));
    }
}
