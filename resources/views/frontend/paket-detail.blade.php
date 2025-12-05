@extends('layouts.frontend')

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7"
             style="background-image: url({{ asset('assets/frontend/img/page-header/page-header-background-transparent.jpg') }});">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1><b>{{ $paket->nama }}</b></h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="#">Home</a></li>
                        <li class="active">Packages</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row py-4">
            <div class="col-md-7 order-2">
                <div class="overflow-hidden">
                    <h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">{{ $paket->nama }}</h2>
                </div><br>
                <div class="overflow-hidden mb-3">
                  <p class="font-weight-bold text-primary mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100"><span class="badge badge-primary badge-sm badge-pill px-2 py-1 mr-1">Water Activity</span> <a href="https://www.airbnb.co.id/experiences/3854605?location=Gili%20Trawangan%2C%20Gili%20Indah%2C%20North%20Lombok%20Regency%2C%20West%20Nusa%20Tenggara%2C%20Indonesia&currentTab=experience_tab&federatedSearchId=3bffbc1d-34fa-4022-8eec-fa797b6f23b0&searchId=8a33b3bd-9b7b-4f89-9284-554f1a32e45b&sectionId=8052fb27-6cf8-4a0f-a75e-32e7f02d1def&modal=REVIEWS"><b>327 reviews</b> </a>
				 <br><br><br>
                    {!! $paket->deskripsi !!}
                </div>


             <div class="alert alert-info alert-sm"  data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                  <dl>
										<dt>Cancellation Policy</dt>
										<dd>Cancel up to 24 hours in advance for a full refund</dd>
										<dt>Private or small groups available </dt>
										<dd>Skip the ticket line</dd>
										<dt>Live tour guide </dt>
										<dd>English and Indonesian</dd>
									
				</dl>
                    
                </div>

                @include('frontend.footnote',["linkReadMore"=>"#faq"])

            </div>
            <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInLeftShorter">
                <img src="{{ $paket->images->first()?->getFirstMediaUrl() }}" class="img-fluid" alt="">
            </div>
        </div>
        @include('frontend.booking-form',$paket)
    </div>
    <br><br>

   

    <br>

<div class="container">
            <div class="row">

<div class="col-md-5">

							<h2 class="mb-none"><strong>Tour Itinerary</strong></h2>
							
							<hr class="solid">

						 <dl>
										<dt><i class="fa fa-check"></i> Starting/pickup location</dt>
										<dd>Depends on the selected option</dd>
										<dt><i class="fa fa-check"></i> Gili Trawangan</dt>
										<dd>Safety briefing</dd>
										<dt><i class="fa fa-check"></i> Gili Meno</dt>
										<dd>Snorkeling</dd>
										<dt><i class="fa fa-check"></i> Gili Meno</dt>
										<dd>Break time, Visit</dd>
										<dt><i class="fa fa-check"></i> Gili Air</dt>
										<dd>Visit, Snorkeling (Optional)</dd>
										<dt><i class="fa fa-check"></i> 10 drop-off locations :</dt>
										<dd>Manta Dive Gili Trawangan Resort, Malimbu Cliff, Mangsit, Oseana office, Kerandangan Beach, Medana, Manta Dive Gili Trawangan Resort, Mentigi Bay Dome Villas, Pantai Sire, Senggigi</dd>
										</dl>

						</div>
<div class="col-md-7">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d45969.00755099203!2d116.04833251353564!3d-8.356735218332602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcddd5ae5aba7d3%3A0x49105ffcd613e0b6!2sPrivate%20Snorkeling%20tour%20gili%20islands!5e0!3m2!1sid!2sid!4v1709008316426!5m2!1sid!2sid" width="630" height="530" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>		</div>
						
						</div></div>
						<br><br>
						
						
   <section class="section bg-dark border-0 m-0">
        <div class="container container-lg">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="pr-5">
                        <span class="d-block font-weight-light negative-ls-1 text-5 mb-1 appear-animation" data-appear-animation="fadeInUp"><em class="text-2 opacity-8">Thing's to know</em></span>
                        <h1 class="font-weight-extra-bold text-color-light negative-ls-3 line-height-1 text-7 mb-3 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="200"><em>About this activity</em></h1>
                        <p class="lead mb-4 pb-2 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="200">Embark on a private or small-group guided snorkeling tour in Gili Islands. Go snorkeling in the crystal clear waters and marvel at the colorful fish, Hawk-bill sea turtles, and beautiful coral. </p>
                        <div class="row appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="200">
                            <div class="col-md-6">
                                <ul class="list list-icons list-style-none text-4 pl-none mb-2 pb-2 pr-3">
                                    <span class="d-block alternative-font text-color-light text-5 mb-4 pb-2 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="200"><b>What is included</b></span>

                                    <li class="text-1 text-color-primary mb-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Hotel transfer (if option selected)</li>
                                    <li class="text-1 text-color-primary mb-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Shared or private boat trip</li>
                                    <li class="text-1 text-color-primary mb-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Mask, snorkel, and fin</li>
                                    <li class="text-1 text-color-primary mb-0 mb-md-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Snorkeling guide</li>
                                    <li class="text-1 text-color-primary mb-0 mb-md-3"><i class="fa fa-check text-primary text-4 mr-1"></i> GoPro camera</li>
                                   <li class="text-1 text-color-primary mb-0 mb-md-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Mineral Water</li>
                                    <li class="text-1 text-color-primary mb-0 mb-md-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Live vest</li>
                                    <li class="text-1 text-color-primary mb-0 mb-md-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Floating ring</li>
                                    <li class="text-1 text-color-primary mb-0 mb-md-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Safety briefing</li>
                                    
                                    
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list list-icons list-style-none text-4 pl-none mb-2 pb-2 pr-3">
                                    
<span class="d-block alternative-font text-color-light text-5 mb-4 pb-2 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="100"><br></span>
                                   
                                   <span class="d-block alternative-font text-color-light text-5 mb-4 pb-2 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="200"><b>What’s guest need to bring</b></span>
                                     <li class="text-1 text-color-primary mb-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Beach towel</li>
                                    <li class="text-1 text-color-primary mb-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Change of clothes</li>
                                    <li class="text-1 text-color-primary mb-3"><i class="fa fa-check text-primary text-4 mr-1"></i> Sun glasses,hat, Sun screen</li>
                                   
                                    
                                   
                                  
                                    
                                </ul>
                                 <div class="alert alert-danger alert-sm"  data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                            <b>Prices Not Include</b> : Lunch and snack</div>
                            </div>
                        </div>
                        <br>

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
                <p class="font-weight-light">Children ages 8 and up can take part, up to a total of 4 children. The activity level for this experience is light. The skill level for this experience is beginner.</p>
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
                                <h4 class="mb-0 appear-animation" data-appear-animation="maskUp"><a href="#" class="text-4 font-weight-bold pt-2 d-block text-dark text-decoration-none pb-1">Meeting Point Options</a></h4>
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

            <h2 class="text-color-dark font-weight-normal text-5 mb-0 pt-2">Tour <strong class="font-weight-extra-bold">Experiences</strong></h2>
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
