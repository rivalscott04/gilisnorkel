@extends('layouts.frontend')

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7"
             style="background-image: url({{ asset('assets/frontend/img/page-header/page-header-background-transparent.jpg') }});">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1>Contact <strong>Us</strong></h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="#">Home</a></li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <div class="container py-2">

        <div class="row py-4">
            <div class="col-lg-6">
                <img src="{{ asset('assets/frontend/img/logo-square.png') }}" alt="" />
            </div>
            <div class="col-lg-6">
                <div
                    class="appear-animation"
                    data-appear-animation="fadeIn"
                    data-appear-animation-delay="800"
                >
                    <h4 class="mt-2 mb-1">Our <strong>Office</strong></h4>
                    <ul class="list list-icons list-icons-style-2 mt-2">
                        <li>
                            <i class="fas fa-map-marker-alt top-6"></i>
                            <strong class="text-dark">Address:</strong> Jl. Pantai Gili
                            Trawangan
                        </li>
                        <li>
                            <i class="fas fa-phone top-6"></i>
                            <strong class="text-dark">Phone:</strong>
                            <a
                                href="https://api.whatsapp.com/send?phone={{$konfig->nomor_telp}}&text=Hallo%20Gili%20Snorkeling"
                            >{{ $konfig->nomor_telp }}</a>
                        </li>
                        <li>
                            <i class="fas fa-envelope top-6"></i>
                            <strong class="text-dark">Email:</strong>
                            <a href="mailto:{{ $konfig->email_notifikasi }}">{{ $konfig->email_notifikasi }}</a>
                        </li>
                    </ul>
                </div>

                <div
                    class="appear-animation"
                    data-appear-animation="fadeIn"
                    data-appear-animation-delay="950"
                >
                    <h4 class="pt-5">Business <strong>Hours</strong></h4>
                    <ul class="list list-icons list-dark mt-2">
                        <li>
                            <i class="far fa-clock top-6"></i> Morning tours 08:30 AM -
                            12:30 PM
                        </li>
                        <li>
                            <i class="far fa-clock top-6"></i> Afternoon tours 02:00 PM
                            - 06:00 PM
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <br><br>





@endsection
