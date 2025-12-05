@extends('layouts.frontend')

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7"
             style="background-image: url({{ asset('assets/frontend/img/page-header/page-header-background-transparent.jpg') }});">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1>Payment<strong> Success</strong></h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="#">Home</a></li>
                        <li class="active">Payment</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-info alert-admin">
                    <div class="row">
                        <div class="col-lg-12">

                            <p><strong class="text-success"><i class="fas fa-exclamation-triangle"></i> Thank you! your payment already accepted !</strong>
                            </p>
                            <table class="table table-condensed">
                                <tr>
                                    <td>Booking Number : <br> <strong>{{$booking->nomor}}</strong></td>
                                    <td style="width: 25%">Date Created : <br> <strong>{{ $booking->created_at->format('d F Y') }}</strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        Bank : <br> <strong>{{str_replace("_"," ",$response["acquirer"]->id??"")}}</strong><br>
                                        Channel : <br><strong>{{ str_replace("_"," ",$response["channel"]->id??"") }}</strong>
                                    </td>
                                    <td style="width: 25%">
                                        Payment Type : <br>
                                        <strong>{{ str_replace("_"," ",$response["service"]->id??"") }}</strong>
                                        Payment Date : <br>
                                        <strong>{{ \Illuminate\Support\Carbon::make($response["transaction"]->date)->format("Y-m-d H:i:s") }}</strong>
                                    </td>
                                </tr>
                            </table>
                            <table class="table table-condensed">
                                 <tr>
                                    <th>Packages</th>
                                    <th style="width: 25%">Participants</th>
                                    <th style="width: 25%">Price</th>
                                </tr>
                                <tr>
                                    <td>{{ $booking->paket->nama }} <br> <br> <span class="badge badge-danger badge-md badge-pill px-2 py-1 mr-1">Booking Date : {{ $booking->tgl_kedatangan->format('d F Y') }}</span></td>
                                    <td>{{ $booking->paketHarga->keterangan }}</td>
                                    <td>IDR {{ number_format($booking->paketHarga->harga) }}</td>
                                </tr>
                                <tr>
                                    <th colspan="2">GRAND TOTAL</th>
                                    <th>IDR {{ number_format($booking->paketHarga->harga) }}</th>
                                </tr>
                            </table>

                            <p><b>A copy of this receipt has been sent to your email. please check your email for details.</b></p>
                            <p>Thank you, for trusting us!</p>
                        </div>
                        <!--div class="col-lg-4 visible-md visible-lg">
                            <img class="appear-animation float-right" src="{{ asset('assets/frontend/img/admin-banner.png') }}" data-appear-animation="fadeIn">
                        </div-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

@endsection
