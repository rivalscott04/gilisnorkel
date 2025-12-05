@extends('layouts.frontend')

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7"
             style="background-image: url({{ asset('assets/frontend/img/page-header/page-header-background-transparent.jpg') }});">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1>Payment<strong> Failed</strong></h1>
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
                        <div class="col-lg-8">

                            <p><strong class="text-danger"><i class="fas fa-exclamation-triangle"></i> Opps! Something gone wrong !</strong>
                            </p>
                            <table class="table table-condensed">
                                <tr>
                                    <td>Booking Number : <br> <strong>{{$booking->nomor}}</strong></td>
                                    <td style="width: 25%">Date Created : <br> <strong>{{ $booking->created_at->format('d F Y') }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Payment Type : <br> <strong>{{str_replace("_"," ",$response->service->id??"")}}</strong></td>
                                    <td style="width: 25%">
                                        Account Details : <br>
                                        <strong>{{ str_replace("_"," ",$response->channel->id??""). ' - '.str_replace("_"," ",$response->acquirer->id??"") }}</strong>
                                        Status : <br>
                                        <strong>{{ $response["transaction"]["id"]??'FAIL' }}</strong>
                                    </td>
                                </tr>
                            </table>
                            <strong>we cannot proceed your payment, please check your payment process !</strong>
                        </div>
                        <div class="col-lg-4 visible-md visible-lg">
                            <img class="appear-animation float-right" src="{{ asset('assets/frontend/img/admin-banner.png') }}" data-appear-animation="fadeIn">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

@endsection
