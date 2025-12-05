@extends('layouts.frontend')

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7"
             style="background-image: url({{ asset('assets/frontend/img/page-header/page-header-background-transparent.jpg') }});">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1>Frequently Asked Questions<strong> (FAQs)</strong></h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="#">Home</a></li>
                        <li class="active">FAQs</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <section class="section section-default border-0 m-0">
        <div class="container py-4">

            <div class="row pb-4">
                <div class="col-md-8">
                    <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="200">
                        <h4 class="mt-2 mb-2">Frequently Asked Questions <strong>(FAQs) </strong></h4>

                        <div class="accordion accordion-modern accordion-modern-grey-scale-1 without-bg mt-4" id="faq-accordion">

                            @foreach($faqs as $faq)
                                <div class="card card-default mb-2">
                                    <div class="card-header">
                                        <h4 class="card-title m-0">
                                            <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#faq-accordion" href="#collapse-{{$faq->id}}">
                                                {{ $faq->question }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-{{$faq->id}}" class="collapse {{ $loop->first ? 'show' : '' }}">
                                        <div class="card-body mt-3">
                                            {!! $faq->answer !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <br>
                    <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="400">
                        <div class="owl-carousel owl-theme dots-inside mb-0 pb-0" data-plugin-options="{'items': 1, 'autoplay': true, 'autoplayTimeout': 4000, 'margin': 10, 'animateOut': 'fadeOut', 'dots': false}">
                            <div class="pb-5">
                                <br><img alt="" class="img-fluid rounded box-shadow-1" src="{{ asset("assets/frontend/img/generic/generic-corporate-3-1-full.jpg") }}">
                            </div>

                        </div>

                        <div class="toggle toggle-primary toggle-simple" data-plugin-toggle>
                            <section class="toggle active">
                                <label>Our Services</label>
                                <div class="toggle-content">
                                    <p>We provide the best experience for your vacation in gili islands with a partner or with family. Our team will invite you to see the natural beauty of the Gili Islands and enjoy swimming with turtles and taking underwater photos.</p>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <br><br>

@endsection
