@extends('layouts.frontend')

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7"
             style="background-image: url({{ asset('assets/frontend/img/page-header/page-header-background-transparent.jpg') }});">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1><strong>Premium Small Group Tours</strong></h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="#">Home</a></li>
                        <li class="active">Our Packages</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <div class="container">
        <div class="row">
            <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInLeftShorter">
                <img src="{{asset("assets/frontend/img/team/team-1.jpg")}}" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 order-2">
                <div class="overflow-hidden">
                    <h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">Premium Small Group Tour with <br>Gili Trawangan Meeting Point</h2>
                </div>
                <br>
                <div class="overflow-hidden mb-3">
                    <p class="font-weight-bold text-primary mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300"><span class="badge badge-primary badge-sm badge-pill px-2 py-1 mr-1">Water Activity</span> <a href="https://www.airbnb.co.id/experiences/3854605?location=Gili%20Trawangan%2C%20Gili%20Indah%2C%20North%20Lombok%20Regency%2C%20West%20Nusa%20Tenggara%2C%20Indonesia&currentTab=experience_tab&federatedSearchId=3bffbc1d-34fa-4022-8eec-fa797b6f23b0&searchId=8a33b3bd-9b7b-4f89-9284-554f1a32e45b&sectionId=8052fb27-6cf8-4a0f-a75e-32e7f02d1def&modal=REVIEWS"><b>327 reviews</b> </a>
									<br>
                                </p>
                </div>
                <p align="justify" class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">  Choose this option for Small-group experience with a maximum of 7 people with a Go Pro camera included.
                </p>
                <p align="justify" class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                    The departure is start from Meeting point at Gili trawangan. And you'll visit Gili Meno and discover the great snorkeling site of turtle heaven where you can swim with Hawkbill sea turtle and You'll also visit turtle hatchery dive on the famous statue on the west side of gili Meno. During snorkeling in gili meno, You can take best photo shot in underwater statues. Head on Gili air spot Han's reef where you'll have the opportunity to snorkel in the coral reef and observe different species of colorful marine creatures.
                </p>

                <div class="alert alert-info alert-sm"  data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                    <b>Meeting point at Gili Trawangan</b>, Jl. Pantai Gili Trawangan, Gili Indah, Kec. Pemenang, North Lombok, West Nusa Tenggara. 83352, Indonesia<br>
                    
                </div>

                
    


                @include('frontend.footnote',["linkReadMore"=>"#faq"])

            </div>
        </div>
    </div>
    <br><br>

    @include('frontend.projects')

    <br><br><br>



    <section class="section bg-dark border-0 m-0">
        <div class="container container-lg">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="pr-5">
                        <span class="d-block font-weight-light negative-ls-1 text-5 mb-1 appear-animation" data-appear-animation="fadeInUp"><em class="text-2 opacity-8">Thing's to know</em></span>
                        <h1 class="font-weight-extra-bold text-color-light negative-ls-3 line-height-1 text-7 mb-3 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="200"><em>General Terms for Operation</em></h1>
                        <p class="lead mb-4 pb-2 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="600">This tour is exclusive private. All snorkeling gear are included, private snorkeling tour will do for 4 hours. Hotel pick-up & drop-off from lombok can be arrange with extra cost. Guest can start from Gili Air,Gili Meno And lombok harbour. <b>Snack, drink and lunch are not included on the price</b>.</p>

                        <div class="row appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="800">
                            <div class="col-md-6">
                                <ul class="list list-icons list-style-none text-4 pl-none mb-2 pb-2 pr-3">
                                    <span class="d-block alternative-font text-color-light text-5 mb-4 pb-2 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="400"><b>What is included</b></span>

                                    <li class="text-1 text-color-primary mb-3"><i class="fa fa-check text-primary text-4 mr-1"></i> GoPro Camera</li>
                                    <li class="text-1 text-color-primary mb-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Private Boat</li>
                                    <li class="text-1 text-color-primary mb-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Profesional Guides</li>
                                    <li class="text-1 text-color-primary mb-0 mb-md-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Snorkeling Gear</li>
                                    <li class="text-1 text-color-primary mb-0 mb-md-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Safety Jacket</li>
                                    <li class="text-1 text-color-primary mb-0 mb-md-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Mineral Water</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list list-icons list-style-none text-4 pl-none mb-2 pb-2 pr-3">
                                    <span class="d-block alternative-font text-color-light text-5 mb-4 pb-2 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="400"><b>What’s guest need to bring</b></span>

                                    <li class="text-1 text-color-primary mb-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Towel</li>
                                    <li class="text-1 text-color-primary mb-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Cloth of change</li>
                                    <li class="text-1 text-color-primary mb-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Sun glasses,hat, Sun screen</li>
                                    <li class="text-1 text-color-primary mb-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Extra cash to buy lunch</li>
                                    <li class="text-1 text-color-primary mb-3"><i class="fa fa-check text-primary text-4 mr-1"></i> IDR cash to purchase refreshment</li>
                                </ul>
                            </div>
                        </div>
                        <br><div class="alert alert-danger alert-sm"  data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                            <b>Prices Not Include</b> : <br>
                            Alcoholic beverage, Personal Travel Insurance, Personal Expenses, Lunch & Snack </div>
                    </div>
                </div>
                <div class="col-lg-6 fluid-col-lg-6" style="min-height: 35vw;">
                    <div class="fluid-col">
                        <div id="carouselSync" class="owl-carousel owl-theme d-none d-sm-block mb-0" data-plugin-options="{'items': 1, 'loop': true, 'nav': false, 'dots': false, 'mouseDrag': false, 'touchDrag': false, 'animateIn': 'fadeIn', 'animateOut': 'fadeOut'}" style="z-index: 0;">
                            <div>
                                <img src="{{ asset('assets/frontend/img/guest1-01-01.png') }}" class="img-fluid" alt="" />
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="container-fluid">
        <div class="row featured-boxes-full featured-boxes-full-scale">
            <div class="col-lg-4 featured-box-full featured-box-full-primary">
                <i class="fa fa-users"></i>
                <h4>Guest Requirements</h4>
                <p class="font-weight-light">Guests ages 7 and up can attend, up to 10 guests total. The activity level for this experience is light. The skill level for this experience is beginner. Follow the tour guide's instructions</p>
            </div>
            <div class="col-lg-4 featured-box-full featured-box-full-primary">
                <i class="fa fa-user-times"></i>
                <h4>Snorkeling for non swimmers </h4>
                <p class="font-weight-light">Some non-swimmers might prefer to go on a snorkeling boat trip. Not only does this ensure that you are taken to a great spot, but you can also count on experienced instructors who will be able to provide qualified personal guidance.</p>
            </div>
            <div class="col-lg-4 featured-box-full featured-box-full-primary">
                <i class="fa fa-ban"></i>
                <h4>Turtle Guidelines</h4>
                <p class="font-weight-light">Do not touch the turtle. Resist the temptation to touch or pet turtles and never ever ride them. Harassing turtles is illegal in many areas. Do not chase the turtle, This can cause severe stress to the animal and never disturb resting turtles.</p>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center bg-color-grey">
            <div class="col-lg-6 p-0">
                <section class="parallax section section-parallax custom-parallax-bg-pos-left custom-sec-left h-100 m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'horizontalPosition': '100%'}"
                         data-image-src="{{ asset('assets/frontend/img/generic/generic-corporate-3-1-full.jpg') }}" style="min-height: 315px;">
                </section>
            </div>
            <div class="col-lg-6 p-0">
                <section class="section section-no-border h-100 m-0">
                    <div class="row m-0">
                        <div class="col-half-section col-half-section-left">


                            <p class="text-2 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">

                            <div class="overflow-hidden">
                                <h4 class="mb-0 appear-animation" data-appear-animation="maskUp"><a href="#" class="text-4 font-weight-bold pt-2 d-block text-dark text-decoration-none pb-1">Meeting Point</a></h4>
                            </div>
                            <b>Lombok</b> - Kecinan Harbour<br>
                            <b>Gili Air</b> - Hotel Pick-up<br>
                            <b>Gili Meno</b> - Hotel Pick-up<br>
                            <b>Gili Trawangan </b> - Front manta dive resort ( Near the road )

                            <br><br><div class="alert alert-danger alert-sm"  data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                                <b>Prices Not Include</b> : Transportation to and from the meeting point</div>

                            </p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row align-items-center bg-color-grey">
            <div class="col-lg-6 order-2 order-lg-1 p-0">
                <section class="section section-no-border h-100 m-0">
                    <div class="row justify-content-end m-0">
                        <div class="col-half-section col-half-section-right custom-text-align-right">

                            <div class="text-2 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">

                                <div class="overflow-hidden">
                                    <h4 class="mb-0 appear-animation" data-appear-animation="maskUp"><a href="#" class="text-4 font-weight-bold pt-2 d-block text-dark text-decoration-none pb-1">Travel Insurances </a></h4>
                                </div>
                                All of our <b>tour packages are not included</b> travel insurances.<br>
                                We strongly recommend our customers to have their own travel insurances and make sure it valid for the use in tour destination country.
                                <br><br>
                            <div class="alert alert-danger alert-sm"  data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                                <b>Prices Not Include</b> : Travel Insurances</div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 p-0">
                <section class="parallax section section-parallax h-100 m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'horizontalPosition': '100%'}"
                         data-image-src="{{ asset('assets/frontend/img/generic/generic-corporate-3-2-full.jpg') }}" style="min-height: 315px;">
                </section>
            </div>
        </div>

    </div>

    <br><br>

    <div class="row">
        <div class="col-md-8 mx-md-auto text-center">

            <h2 class="text-color-dark font-weight-normal text-5 mb-0 pt-2">Tour <strong class="font-weight-extra-bold">Itinerary</strong></h2>
            <p>Through your journey, you will have the chance to discover the three islands that make up Gili, which are full of wonderful activities and snorkelling spots. As you can see on the map, you will go from the aquatic statues to the sunset point, passing by the coral reef and the turtle heaven. Across these different spots you will have time to discover, swim and chill onboard.</p>

            <section class="timeline" id="timeline">
                <div class="timeline-body">
                    <div class="timeline-date">
                        <h3 class="text-primary font-weight-bold">Departure --- Statues</h3>
                    </div>

                    <article class="timeline-box left text-left appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="200">
                        <div class="timeline-box-arrow"></div>
                        <div class="p-2">
                            <img alt="" class="img-fluid" src="{{ asset('assets/frontend/img/history/history-1.jpg') }}" />
                            <h3 class="font-weight-bold text-3 mt-3 mb-1">Departure</h3>
                            <p class="mb-0 text-2">We will start and end the tour from sama-sama reggae bar. And we will meet at the front manta dive resort in Gili Trawangan.</p>
                        </div>
                    </article>
                    <article class="timeline-box right text-left appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="400">
                        <div class="timeline-box-arrow"></div>
                        <div class="p-2">
                            <img alt="" class="img-fluid" src="{{ asset('assets/frontend/img/history/history-2.jpg') }}" />
                            <h3 class="font-weight-bold text-3 mt-3 mb-1">Statues</h3>
                            <p class="mb-0 text-2">You will go from the aquatic statues to the sunset point, passing by the coral reef and the turtle heaven.</p>
                        </div>
                    </article>



                    <div class="timeline-date">
                        <h3 class="text-primary font-weight-bold">Turtle, Coral Reef --- Swim</h3>
                    </div>

                    <article class="timeline-box left text-left appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="600">
                        <div class="timeline-box-arrow"></div>
                        <div class="p-2">
                            <img alt="" class="img-fluid" src="{{ asset('assets/frontend/img/history/history-3.jpg') }}" />
                            <h3 class="font-weight-bold text-3 mt-3 mb-1">Turtle & Coral Reef</h3>
                            <p class="mb-0 text-2">You'll have the opportunity to snorkel in the coral reef and observe different species of colorful marine creatures,including surgeon fish, sea goldies and clown fish.</p>
                        </div>
                    </article>

                    <article class="timeline-box right text-left appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="400">
                        <div class="timeline-box-arrow"></div>
                        <div class="p-2">
                            <img alt="" class="img-fluid" src="{{ asset('assets/frontend/img/history/history-4.jpg') }}" />
                            <h3 class="font-weight-bold text-3 mt-3 mb-1">Swim</h3>
                            <p class="mb-0 text-2">During this tour, you'll be able to explore Gili Air, Gili Meno and Gili Trawangan.</p>
                        </div>
                    </article>
                </div>
            </section>

        </div>
    </div>

    @include('frontend.guides')

    <section>
        <div class="container py-4">

            <div class="row pb-4">
                <div class="col-md-8">
                    <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="200">
                        <h4 class="mt-2 mb-2">Things <strong>to know </strong></h4>

                        <div class="accordion accordion-modern accordion-modern-grey-scale-1 without-bg mt-4" id="accordion11">
                            <div class="card card-default mb-2">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11One">
                                            Cancellation Policy
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse11One" class="collapse show">
                                    <div class="card-body mt-3">
                                        <p>
                                        <ul>
                                            <li>If you cancel up to 7 days before the Experience start time, or within 24 hours of booking provided the booking was made more than 48 hours before the Experience start time, you will get a full refund.</li>
                                            <li>Cancellation made by customers on the same day they make booking for any reason is non-refundable.</li>
                                            <li>Customers who don’t show up on the day of tour departure is not-refundable.</li>

                                        </ul>
                                        </p>


                                    </div>
                                </div>
                            </div>
                            <div class="card card-default mb-2">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11Two">
                                            Payment Policy
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse11Two" class="collapse">
                                    <div class="card-body mt-3">
                                        <p>Customers must make appropriate payments according to the nominal price mentioned on the tour package details until the most recent digit.</p>


                                    </div>
                                </div>
                            </div>
                            <div class="card card-default mb-2">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11Three">
                                            We are not responsible and can not be prosecuted for :
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse11Three" class="collapse">
                                    <div class="card-body mt-3">
                                        <ul>
                                            <li>Accidents, damages or losses experienced by participants and customer luggage during the trip.</li>
                                            <li>Cancellations and changes or reduce of tour schedule because of obstacle that occurs during the tour such as breaking down of  car engine, traffic jams, natural disaster, riots, and so on that are ‘Force Majeure’</li>
                                            <li>Illness or death of customers due to customer’s illness or accident during the trip.</li>

                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="card card-default mb-2">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11Four">
                                            Travel Insurances
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse11Four" class="collapse">
                                    <div class="card-body mt-3">
                                        <ul>
                                            <li>All of our tour packages are not included travel insurances.</li>
                                            <li>We strongly recommend our customers to have their own travel insurances and make sure it valid for the use in tour destination country.</li>

                                        </ul>


                                    </div>
                                </div>
                            </div>
                            <div class="card card-default mb-2">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11Five">
                                            Force Majeure
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse11Five" class="collapse">
                                    <div class="card-body mt-3">
                                        <ul>
                                            <li>We will not be liable for any non-performance or violation of these Terms, such as for transaction failure, restricted access to the Site, or any damage or harm to users caused by any act or condition beyond the reasonable control of either You or Us (“Force Majeure Event”).</li>
                                            <li>Force  Majeure Events include but are not limited to natural disaster (floods, earthquakes), epidemic, riot, a declaration of war, war, military action, terrorist action, embargo, sanctions, changes in laws or regulations, lightning, hurricanes / typhoons / cyclones, labor strikes, demonstrations, airline or hotel bankruptcy or insolvency, and so forth.</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <br>
                    <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="400">
                        <div class="owl-carousel owl-theme dots-inside mb-0 pb-0" data-plugin-options="{'items': 1, 'autoplay': true, 'autoplayTimeout': 4000, 'margin': 10, 'animateOut': 'fadeOut', 'dots': false}">
                            <div class="pb-5">
                                <br><img alt="" class="img-fluid rounded box-shadow-1" src="{{ asset('assets/frontend/img/12424.jpg') }}">
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
