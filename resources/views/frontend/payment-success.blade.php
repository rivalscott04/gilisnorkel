@extends('layouts.frontend_gsbaru')

@section('content')
    <!-- Hero / Step wizard -->
    <div class="hero_in cart_section">
        <div class="wrapper">
            <div class="container">
                <div class="bs-wizard clearfix">
                    <div class="bs-wizard-step complete">
                        <div class="text-center bs-wizard-stepnum">Your cart</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#0" class="bs-wizard-dot"></a>
                    </div>

                    <div class="bs-wizard-step complete">
                        <div class="text-center bs-wizard-stepnum">Payment</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#0" class="bs-wizard-dot"></a>
                    </div>

                    <div class="bs-wizard-step active">
                        <div class="text-center bs-wizard-stepnum">Finish!</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#0" class="bs-wizard-dot"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg_color_1">
        <div class="container margin_60_35">
            <div class="row">
                <!-- Left: booking item -->
                <div class="col-lg-8">
                    <div class="box_cart">
                        <div class="message" style="background: #d4edda; border-color: #c3e6cb;">
                            <p>
                                <strong style="color: #155724;"><i class="icon-check"></i> Payment Successful!</strong><br>
                                Thank you! Your payment has been accepted.
                            </p>
                        </div>

                        <table class="table cart-list">
                            <thead>
                            <tr>
                                <th>Item</th>
                                <th>Departure Date</th>
                                <th>Participants</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="thumb_cart">
                                        <img src="{{ asset('gsbaru/img/thumb_cart_1.jpg') }}" alt="Package">
                                    </div>
                                    <span class="item_cart">{{ $booking->paket->nama }}</span>
                                </td>
                                <td>
                                    {{ $booking->tgl_kedatangan->format('d M Y') }}
                                </td>
                                <td>
                                    <strong>{{ $booking->paketHarga->keterangan }}</strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <hr>

                        <h5>Payment Details</h5>
                        <table class="table">
                            <tr>
                                <td>Bank</td>
                                <td><strong>{{ str_replace("_"," ", $response["acquirer"]->id ?? "-") }}</strong></td>
                            </tr>
                            <tr>
                                <td>Channel</td>
                                <td><strong>{{ str_replace("_"," ", $response["channel"]->id ?? "-") }}</strong></td>
                            </tr>
                            <tr>
                                <td>Payment Type</td>
                                <td><strong>{{ str_replace("_"," ", $response["service"]->id ?? "-") }}</strong></td>
                            </tr>
                            <tr>
                                <td>Payment Date</td>
                                <td><strong>{{ \Illuminate\Support\Carbon::make($response["transaction"]->date)->format("d M Y H:i") }}</strong></td>
                            </tr>
                        </table>

                        <p><b>A copy of this receipt has been sent to your email. Please check your email for details.</b></p>
                    </div>
                </div>

                <!-- Right: summary -->
                <aside class="col-lg-4" id="sidebar">
                    <div class="box_detail cart">
                        <h3>Order summary</h3>
                        <ul>
                            <li>
                                Booking Number
                                <span>{{ $booking->nomor }}</span>
                            </li>
                            <li>
                                Created at
                                <span>{{ $booking->created_at->format('d M Y') }}</span>
                            </li>
                            <li>
                                Status
                                <span class="badge" style="background: #28a745; color: #fff; padding: 5px 10px; border-radius: 4px;">PAID</span>
                            </li>
                        </ul>
                        <hr>
                        <ul class="total">
                            <li>
                                Total
                                <span>Rp {{ number_format($booking->paketHarga->harga) }}</span>
                            </li>
                        </ul>

                        <a href="{{ route('frontend.home') }}" class="btn_1 full-width purchase">
                            Back to Home
                        </a>
                        <small>Thank you for trusting us!</small>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
