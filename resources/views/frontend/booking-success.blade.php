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

                    <div class="bs-wizard-step active">
                        <div class="text-center bs-wizard-stepnum">Payment</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#0" class="bs-wizard-dot"></a>
                    </div>

                    <div class="bs-wizard-step disabled">
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
                        <div class="message">
                            <p>
                                <strong>Thank you for trusting us!</strong><br>
                                Your booking has been created successfully.
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
                    </div>
                </div>

                <!-- Right: summary & checkout -->
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
                                Payment Method
                                <span>{{ $booking->bankAccount->nama }}</span>
                            </li>
                        </ul>
                        <hr>
                        <ul class="total">
                            <li>
                                Total
                                <span>Rp {{ number_format($booking->paketHarga->harga) }}</span>
                            </li>
                        </ul>

                        <a href="javascript:void(0);" onclick="showPaymentModal('{!! data_get($paymentUrl, 'response_encode.payment.url', '#') !!}')"
                           class="btn_1 full-width purchase">
                            Proceed to payment
                        </a>
                        <small>Please complete your payment by clicking the button above.</small>

                        <div class="mt-3">
                            <img src="{{ asset('assets/frontend/img/logos/1.jpg') }}" width="50" height="20" alt="">
                            <img src="{{ asset('assets/frontend/img/logos/2.jpg') }}" width="50" height="20" alt="">
                            <img src="{{ asset('assets/frontend/img/logos/3.jpg') }}" width="50" height="20" alt="">
                            <img src="{{ asset('assets/frontend/img/logos/5.jpg') }}" width="50" height="20" alt="">
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection

@push('frontend-css')
    <script src="https://jokul.doku.com/jokul-checkout-js/v1/jokul-checkout-1.0.0.js"></script>
@endpush

@push('frontend-js')
    <script>
        function showPaymentModal(url) {
            if (typeof loadJokulCheckout === 'function') {
                loadJokulCheckout(url);
            } else {
                window.location.href = url;
            }
        }
    </script>
@endpush
