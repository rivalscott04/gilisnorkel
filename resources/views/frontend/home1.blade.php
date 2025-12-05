@extends('layouts.frontend')

@section('content')
    <div class="slider-container rev_slider_wrapper" style="height: 100vh;">
        <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'sliderLayout': 'fullscreen', 'delay': 9000, 'gridwidth': 1170, 'gridheight': 1000, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,500], 'parallax': { 'type': 'scroll', 'origo': 'enterpoint', 'speed': 1000, 'levels': [2,3,4,5,6,7,8,9,12,50], 'enable_onmobile': 'on' }}">
            <ul>
                <li class="slide-overlay" data-transition="fade">
                    <img src="{{ asset('assets/frontend/img/blank.gif') }}"
                         alt=""
                         data-bgposition="center center"
                         data-bgfit="cover"
                         data-bgrepeat="no-repeat"
                         class="rev-slidebg">

                    <div class="rs-background-video-layer"
                         data-forcerewind="on"
                         data-volume="on"
                         data-videowidth="100%"
                         data-videoheight="100%"
                         data-videomp4="{{ asset('assets/frontend/video/gilisnorkeling.mp4') }}"
                         data-videopreload="preload"
                         data-videoloop="no-loop"
                         data-forceCover="1"
                         data-aspectratio="16:9"
                         data-autoplay="true"
                         data-autoplayonlyfirsttime="true"
                         data-nextslideatend="false">
                    </div>


                    <div class="tp-caption text-color-light font-weight-normal"
                         data-x="center"
                         data-y="center" data-voffset="['-60','-60','-60','-100']"
                         data-start="700"
                         data-fontsize="['22','22','22','40']"
                         data-lineheight="['55','55','55','75']"
                         data-transform_in="y:[-50%];opacity:0;s:500;" style="z-index: 5;">This site is under construction</div>


                    <div class="tp-caption font-weight-extra-bold text-color-light negative-ls-2"
                         data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-x="center"
                         data-y="center"
                         data-fontsize="['100','100','100','140']"
                         data-lineheight="['15','15','15','45']" style="z-index: 5;">Coming Soon</div>

                    <div class="tp-caption font-weight-light"
                         data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                         data-x="center"
                         data-y="center" data-voffset="['80','80','80','110']"
                         data-fontsize="['28','28','28','60']"
                         data-lineheight="['10','10','00','35']"
                         style="color: #ffffff; z-index: 5;"><span class="badge badge-primary badge-sm badge-pill px-2 py-1 mr-1">Get your best experience with us</span></div>

                    <a class="tp-caption slider-scroll-button"
                       data-hash
                       data-hash-offset="80"
                       href="#main"
                       data-x="center"
                       data-y="bottom" data-voffset="['30','30','30','30']"
                       data-start="1600"
                       data-transform_in="y:[100%];s:500;"
                       data-transform_out="y:[100%];opacity:0;s:500;"
                       data-mask_in="x:0px;y:0px;" style="z-index: 5;"></a>

                    <div class="tp-dottedoverlay"></div>
                </li>
            </ul>
        </div>
    </div>

    <!--div class="home-intro bg-primary" id="home-intro">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-lg-8">
                    <p>
                        Book your snorkeling tour in <span class="highlighted-word">gili islands</span> easily and quickly with us


                        <span>We are the first and most trusted online service for the region. </span>
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="get-started text-left text-lg-right">
                        <a href="{{ route('frontend.booking.index') }}" class="btn btn-dark btn-lg text-3 font-weight-semibold px-4 py-3">Get Started Now</a>
                        <div class="learn-more">or <a href="{{ route('frontend.faq') }}">learn more.</a></div>
                    </div>
                </div>
            </div>

        </div>
    </div-->

    <!--div class="container">

        <div class="row text-center pt-5 pb-4 mt-5 mb-4">
            <div class="col-md-10 mx-md-auto">
                <h1 class="word-rotator-title font-weight-bold text-8 mb-3 appear-animation" data-appear-animation="fadeInUpShorter">
                    Explore The Natural Beauty of
                    <strong class="inverted">
                        <span class="word-rotator" data-plugin-options="{'delay': 2000, 'animDelay': 300}">
                            <span class="word-rotator-items">
                                <span>Gili Trawangan</span>
                                <span>Gili Meno</span>
                                <span>Gili Air</span>
                            </span>
                        </span>
                    </strong>
                    island
                </h1>
                <p class="lead appear-animation mb-0" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                    Gilisnorkeling.com as being a quick and easy place to book your snorkeling tour in gili islands<br>
                    We are the first and most trusted online service for the region.
                    We provide the best experience for your vacation <br>in gili islands with a partner or with family. Our team will invite you to see the natural beauty <br>of the Gili Islands and enjoy swimming with turtles and taking underwater photos.

                </p>
            </div>
        </div>
    </div>
    <section class="section section-custom-map appear-animation" data-appear-animation="fadeInUpShorter" id="about-us">
        <section class="section section-default section-footer">
            <div class="container">
                <div class="row align-items-center text-center text-md-left">
                    <div class="col-md-6 mb-5 mb-md-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
                        <h2 class="font-weight-bold text-7 line-height-1 ls-0 mb-3">About Us</h2>
                        <p class="lead">We are a unique online booking system where you can check live tour availability, make immediate confirmed bookings, and receive e-tickets straight away for your activities.</p>
                        <p class="mb-4 pr-md-5">We work with a very professional team, and we provide work operational standards that we always prioritize. Booked through us for the fastest, safest and best priced services in Gili Islands. Don't miss your memorable experience in gili trawangan And joining with us!</p>

                    </div>
                    <div class="col-md-6 col-lg-5 offset-lg-1 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
                        <div class="owl-carousel owl-theme nav-style-1 stage-margin mb-0" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 1}, '1200': {'items': 1}}, 'margin': 25, 'loop': true, 'nav': true, 'dots': false, 'stagePadding': 40}">
                            <div class="p-4">
                                <img src="{{ asset('assets/frontend/img/gallery/gallery-6.png') }}"/>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

{{--    PRODUCT--}}
    <div class="container">
        <h4 class="font-weight-bold">Our Packages</h4>
        <div class="row">
            @foreach($paket as $item)
                <div class="col-md-3 col-sm-6 col-xs-12">

                    <span class="thumb-info thumb-info-hide-wrapper-bg">
                        <div class="thumb-info-wrapper">
                            <a href="">
                                <img src="{{ $item->images->first()?->getFirstMediaUrl() }}" class="img-responsive" alt="" height="250">
                            </a>
                        </div>
                        <span class="thumb-info-caption"><br>
                        <h4 class="font-weight-bold text-5 line-height-1 ls-0 mb-3">{{ $item->nama }}</h4>

                        <span class="badge badge-primary badge-sm badge-pill px-2 py-1 mr-1">Water Activity</span> <a href="https://www.airbnb.co.id/experiences/3854605?location=Gili%20Trawangan%2C%20Gili%20Indah%2C%20North%20Lombok%20Regency%2C%20West%20Nusa%20Tenggara%2C%20Indonesia&currentTab=experience_tab&federatedSearchId=3bffbc1d-34fa-4022-8eec-fa797b6f23b0&searchId=8a33b3bd-9b7b-4f89-9284-554f1a32e45b&sectionId=8052fb27-6cf8-4a0f-a75e-32e7f02d1def&modal=REVIEWS"><b>327 reviews</b></a>
                            <br>
                             <span class="thumb-info-caption-text">
                             {!! $item->deskripsi !!}
                             </span>

                            <div style="color:black"><b>The price start from :</b><br></div>
                            <div class="row">
                            <div class="col-6"><h2 class="font-weight-bold text-5 line-height-1 ls-0 mb-3"  style="color:red">Rp {{ number_format($item->paketHarga->first()?->harga??0) }}</h2></div>
                                <div class="col-6"> <span class="badge badge-primary badge-sm badge-pill px-2 py-1 mr-1">per person</span></div>
                            </div>
                            <a href="{{ route('frontend.booking.index',$item->id) }}" class="btn btn-modern btn-primary mt-3">Book Now</a>
                            <a href="{{ route('frontend.paket-detail',$item->id) }}" class="btn btn-modern btn-dark mt-3">Read more</a>

                    </span>

                </div>
            @endforeach
        </div>
    </div>


    <br><br>

    <section class="section bg-dark border-0 m-0">
        <div class="container container-lg">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="pr-5">
                        <span class="d-block font-weight-light negative-ls-1 text-5 mb-1 appear-animation" data-appear-animation="fadeInUp"><em class="text-2 opacity-8">Thing's to know</em></span>
                        <h1 class="font-weight-extra-bold text-color-light negative-ls-3 line-height-1 text-7 mb-3 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="200"><em>About this activity</em></h1>
                        <p class="lead mb-4 pb-2 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="600">This tour is exclusive private. All snorkeling gear are included, private snorkeling tour will do for 2.5 - 7 hours. Hotel pick-up & drop-off from lombok can be arrange with extra cost. Guest can start from Gili Air,Gili Meno And lombok harbour. <b>Snack, drink and lunch are not included on the price</b>. Free cancellation
  up to 24 hours in advance for a full refund. Live tour guide
    (English / Indonesian language) </p>
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
                        <br><div class="alert alert-primary alert-sm"  data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                            <b>Prices Not Include</b> : Alcoholic beverage, Personal Travel Insurance, Personal Expenses, Lunch & Snack </div>

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


    <section class="section section-default border-0 m-0">
        <div class="container py-4">

            <div class="row pb-4">
                <div class="col-md-8">
                    <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="200">
                        <h4 class="mt-2 mb-2">Frequently Asked Questions <strong>(FAQs) </strong></h4>

                        <div class="accordion accordion-modern accordion-modern-grey-scale-1 without-bg mt-4" id="accordion11">
                            <div class="card card-default mb-2">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11One">
                                            Which Gili is best for snorkelling?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse11One" class="collapse show">
                                    <div class="card-body mt-3">
                                        <p>The best Gili Island for snorkeling is Gili Meno. While Gili Trawangan is unquestionably the most popular, Gili Meno has great snorkeling access and is home to the popular Gili Island Wreck (Meno Bounty) and probably the most photographed spot in Indonesia– the underwater statues.</p>


                                    </div>
                                </div>
                            </div>
                            <div class="card card-default mb-2">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11Two">
                                            Is Gili Air good for snorkeling?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse11Two" class="collapse">
                                    <div class="card-body mt-3">
                                        <p>Gili Air is well-known for its super clear turquoise water to snorkel and dive in. The entire northern part of the island is home to sea turtles. So the chance to spot a turtle is high.</p>


                                    </div>
                                </div>
                            </div>
                            <div class="card card-default mb-2">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11Three">
                                            Can we swim from Gili Trawangan to Gili Meno?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse11Three" class="collapse">
                                    <div class="card-body mt-3">
                                        <p>Can we swim to the other Gilis? While it is perfectly safe to swim and snorkel around the Gilis you should never try to swim to the next island, it is much further than it looks and the currents in the middle of the channel can be very strong even for the best of swimmers.</p>


                                    </div>
                                </div>
                            </div>
                            <div class="card card-default mb-2">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11Four">
                                            Can we touch turtles when we do snorkeling?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse11Four" class="collapse">
                                    <div class="card-body mt-3">
                                        <p>Sea turtles are among the most incredible and charming creatures populating our oceans. They have existed for over 150 million years, which is long enough to have seen the rise and demise of dinosaurs. So, it doesn't come as a surprise that swimming with these ancient reptiles is one of the most sought after and treasured experiences for many divers and snorkelers around the world. That being said, it is important to remember, that we are guests in the ocean and should treat all marine life with respect. Check our guidelines <a href="">here</a></p>


                                    </div>
                                </div>
                            </div>
                            <div class="card card-default mb-2">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11Five">
                                            We can’t swimming. Can we do snorkeling?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse11Five" class="collapse">
                                    <div class="card-body mt-3">
                                        <p>Snorkeling is a fun and rewarding activity that, unlike many other watersports,
                                            benefits from its simplicity. There’s no need to haul a bag full of heavy equipment or go through a certification course to watch and appreciate the beauty of the underwater world. All that’s necessary to start snorkeling is some basic skills and a small set of well-fitting gear, which makes it easily accessible to pretty much anyone. But what about non-swimmers, can they snorkel?

                                            We’ll address this frequently asked question and give you some tips on how to make your snorkeling experience enjoyable and comfortable.Check our guidelines <a href="#">here</a>
                                        </p>


                                    </div>
                                </div>
                            </div>

                            <div class="card card-default mb-2">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11Six">
                                            Can we see turtles in Gili Trawangan?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse11Six" class="collapse">
                                    <div class="card-body mt-3">
                                        <p>There are multiple spots to snorkel or swim with sea turtles on Gili Trawangan.
                                            A good place (and our personal favorite) is Turtle Point on the east side of the island.
                                        </p>


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
                                <br><img alt="" class="img-fluid rounded box-shadow-1" src="{{ asset('assets/frontend/img/generic/12424.jpg')}}">
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
    <br> <br> <br>

    <div class="container">
    <div class="row text-center pt-4">
    <div class="col">
        <h2 class="word-rotator-title font-weight-bold text-8 mb-2">
            You're not the only ones
            <strong class="font-weight-extra-bold">
                    <span class="word-rotator" data-plugin-options="{'delay': 3500, 'animDelay': 400}">
                        <span class="word-rotator-items">
                            <span>excited</span>
                            <span>happy</span>
                        </span>
                    </span>
            </strong>
            about Gili Snorkeling.com
        </h2>
        <h4 class="text-primary lead tall text-4">We work with a very professional team, and we provide work operational standards that we always prioritize</h4>
    </div>
</div>
</div>
<br>

    <div class="container">
        <div class="col-lg-12">
			<div class="owl-carousel owl-theme" data-plugin-options="{'items': 1, 'autoplay': true, 'autoplayTimeout': 9500}">

            <div class="testimonial testimonial-style-3">
                <blockquote>
                            <p class="mb-0">What a nice experience ! We get to see so many turtles, it was wonderful. Thank you so much to Surki and his colleagues for the beautiful pictures and videos.</p>
                        </blockquote>
                        <div class="testimonial-arrow-down"></div>
                        <div class="testimonial-author pb-3">
                            <div class="testimonial-author-thumbnail">
                                <img src="{{ asset('assets/frontend/img/clients/22.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <p><strong class="font-weight-extra-bold"><a href="https://www.airbnb.com/experiences/3854605?location=Gili%20Trawangan%2C%20Gili%20Indah%2C%20North%20Lombok%20Regency%2C%20West%20Nusa%20Tenggara%2C%20Indonesia&currentTab=experience_tab&federatedSearchId=3bffbc1d-34fa-4022-8eec-fa797b6f23b0&searchId=8a33b3bd-9b7b-4f89-9284-554f1a32e45b&sectionId=8052fb27-6cf8-4a0f-a75e-32e7f02d1def&locale=en&_set_bev_on_new_domain=1704693842_MDVmMDVjZDFlMDVj&modal=REVIEWS">Adeline</a></strong><span>Guest</span></p>
                        </div>
				</div>

                <div class="testimonial testimonial-style-3">
                <blockquote>
                            <p class="mb-0">Greatest experience ever. Beautiful ocean & turtle, etc I wanna go back and do it again. Kind & nice people, comfort atmosphere, everything is perfect. Thank you guys!</p>
                        </blockquote>
                        <div class="testimonial-arrow-down"></div>
                        <div class="testimonial-author pb-3">
                            <div class="testimonial-author-thumbnail">
                                <img src="{{ asset('assets/frontend/img/clients/11.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <p><strong class="font-weight-extra-bold"><a href="https://www.airbnb.com/experiences/3854605?location=Gili%20Trawangan%2C%20Gili%20Indah%2C%20North%20Lombok%20Regency%2C%20West%20Nusa%20Tenggara%2C%20Indonesia&currentTab=experience_tab&federatedSearchId=3bffbc1d-34fa-4022-8eec-fa797b6f23b0&searchId=8a33b3bd-9b7b-4f89-9284-554f1a32e45b&sectionId=8052fb27-6cf8-4a0f-a75e-32e7f02d1def&locale=en&_set_bev_on_new_domain=1704693842_MDVmMDVjZDFlMDVj&modal=REVIEWS">호영</a></strong><span>Guest</span></p>
                        </div>
				</div>

                <div class="testimonial testimonial-style-3">
                <blockquote>
                            <p class="mb-0">Totally recommend the tour! We visited 3 beautiful spots and were able to see many turtles 🐢. The tour guides were super friendly and took amazing pictures!</p>
                        </blockquote>
                        <div class="testimonial-arrow-down"></div>
                        <div class="testimonial-author pb-3">
                            <div class="testimonial-author-thumbnail">
                                <img src="{{ asset('assets/frontend/img/clients/33.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <p><strong class="font-weight-extra-bold"><a href="https://www.airbnb.com/experiences/3854605?location=Gili%20Trawangan%2C%20Gili%20Indah%2C%20North%20Lombok%20Regency%2C%20West%20Nusa%20Tenggara%2C%20Indonesia&currentTab=experience_tab&federatedSearchId=3bffbc1d-34fa-4022-8eec-fa797b6f23b0&searchId=8a33b3bd-9b7b-4f89-9284-554f1a32e45b&sectionId=8052fb27-6cf8-4a0f-a75e-32e7f02d1def&locale=en&_set_bev_on_new_domain=1704693842_MDVmMDVjZDFlMDVj&modal=REVIEWS">Grace Natasha</a></strong><span>Guest</span></p>
                        </div>
				</div>



				<div class="testimonial testimonial-style-3">
                <blockquote>
                            <p class="mb-0">It was an amazing experience. We did it for the first time and it’s just gets better and better every time we went inside the water. It was a beautiful experience. Everyone should do it. The guide helped us a lot as we’re non swimmer. Thank you so much for everything.</p>
                        </blockquote>
                        <div class="testimonial-arrow-down"></div>
                        <div class="testimonial-author pb-3">
                            <div class="testimonial-author-thumbnail">
                                <img src="{{ asset('assets/frontend/img/clients/44.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <p><strong class="font-weight-extra-bold"><a href="https://www.airbnb.com/experiences/3854605?location=Gili%20Trawangan%2C%20Gili%20Indah%2C%20North%20Lombok%20Regency%2C%20West%20Nusa%20Tenggara%2C%20Indonesia&currentTab=experience_tab&federatedSearchId=3bffbc1d-34fa-4022-8eec-fa797b6f23b0&searchId=8a33b3bd-9b7b-4f89-9284-554f1a32e45b&sectionId=8052fb27-6cf8-4a0f-a75e-32e7f02d1def&locale=en&_set_bev_on_new_domain=1704693842_MDVmMDVjZDFlMDVj&modal=REVIEWS">ArbAz</a></strong><span>Guest</span></p>
                        </div>
				</div>


				<div class="testimonial testimonial-style-3">
                <blockquote>
                            <p class="mb-0">It was a superb private snorkeling tour for us.. Hans was our companion.. He showed some superb marine lives and depths to us.. both of us are just beginners in swimming.. but he took care of us and have clicked some incredible pics and videos.. the activity is just as described.. choose private tour if this is your first snorkeling experience.</p>
                        </blockquote>
                        <div class="testimonial-arrow-down"></div>
                        <div class="testimonial-author pb-3">
                            <div class="testimonial-author-thumbnail">
                                <img src="{{ asset('assets/frontend/img/clients/55.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <p><strong class="font-weight-extra-bold"><a href="https://www.airbnb.com/experiences/3854605?location=Gili%20Trawangan%2C%20Gili%20Indah%2C%20North%20Lombok%20Regency%2C%20West%20Nusa%20Tenggara%2C%20Indonesia&currentTab=experience_tab&federatedSearchId=3bffbc1d-34fa-4022-8eec-fa797b6f23b0&searchId=8a33b3bd-9b7b-4f89-9284-554f1a32e45b&sectionId=8052fb27-6cf8-4a0f-a75e-32e7f02d1def&locale=en&_set_bev_on_new_domain=1704693842_MDVmMDVjZDFlMDVj&modal=REVIEWS">Sarath</a></strong><span>Guest</span></p>
                        </div>
				</div>

                <div class="testimonial testimonial-style-3">
                <blockquote>
                            <p class="mb-0">Der Ausflug war super, wir war eine kleine Gruppe
Unser Leiter hat richtig schöne Fotos gemacht und versucht alles zu zeigen :)
Hätte es mir bunter vorgestellt aber sonst richtig schön, auch die ganzen Schildkröten waren so süß</p>
                        </blockquote>
                        <div class="testimonial-arrow-down"></div>
                        <div class="testimonial-author pb-3">
                            <div class="testimonial-author-thumbnail">
                                <img src="{{ asset('assets/frontend/img/clients/66.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <p><strong class="font-weight-extra-bold"><a href="https://www.airbnb.com/experiences/3854605?location=Gili%20Trawangan%2C%20Gili%20Indah%2C%20North%20Lombok%20Regency%2C%20West%20Nusa%20Tenggara%2C%20Indonesia&currentTab=experience_tab&federatedSearchId=3bffbc1d-34fa-4022-8eec-fa797b6f23b0&searchId=8a33b3bd-9b7b-4f89-9284-554f1a32e45b&sectionId=8052fb27-6cf8-4a0f-a75e-32e7f02d1def&locale=en&_set_bev_on_new_domain=1704693842_MDVmMDVjZDFlMDVj&modal=REVIEWS">Laura</a></strong><span>Guest</span></p>
                        </div>
				</div>

                <div class="testimonial testimonial-style-3">
                <blockquote>
                            <p class="mb-0">Totally recommend this experience. We book this just for 2 people so we had the boat for ourselves. The crew was very thoughtful and dedicated to make us having a good time. They took us to the best spots at the best time with no crowds and even took us to have lunch at the place that we wanted. At the end of the experience the connect the sd card from the gopro directly to your phone so you have every video and photo in best quality.</p>
                        </blockquote>
                        <div class="testimonial-arrow-down"></div>
                        <div class="testimonial-author pb-3">
                            <div class="testimonial-author-thumbnail">
                                <img src="{{ asset('assets/frontend/img/clients/77.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <p><strong class="font-weight-extra-bold"><a href="https://www.airbnb.com/experiences/3854605?location=Gili%20Trawangan%2C%20Gili%20Indah%2C%20North%20Lombok%20Regency%2C%20West%20Nusa%20Tenggara%2C%20Indonesia&currentTab=experience_tab&federatedSearchId=3bffbc1d-34fa-4022-8eec-fa797b6f23b0&searchId=8a33b3bd-9b7b-4f89-9284-554f1a32e45b&sectionId=8052fb27-6cf8-4a0f-a75e-32e7f02d1def&locale=en&_set_bev_on_new_domain=1704693842_MDVmMDVjZDFlMDVj&modal=REVIEWS">Ryan</a></strong><span>Guest</span></p>
                        </div>
				</div>

                <div class="testimonial testimonial-style-3">
                <blockquote>
                            <p class="mb-0">It was my first snorkeling experience and I panicked at first that I had to breathe only with my mouth, but whenever I did, our staff rescued me from drowning😂
They helped me see beautiful photo spots and turtles all the time, and the GoPro video is also great. I want to snorkel with them next time.</p>
                        </blockquote>
                        <div class="testimonial-arrow-down"></div>
                        <div class="testimonial-author pb-3">
                            <div class="testimonial-author-thumbnail">
                                <img src="{{ asset('assets/frontend/img/clients/88.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <p><strong class="font-weight-extra-bold"><a href="https://www.airbnb.com/experiences/3854605?location=Gili%20Trawangan%2C%20Gili%20Indah%2C%20North%20Lombok%20Regency%2C%20West%20Nusa%20Tenggara%2C%20Indonesia&currentTab=experience_tab&federatedSearchId=3bffbc1d-34fa-4022-8eec-fa797b6f23b0&searchId=8a33b3bd-9b7b-4f89-9284-554f1a32e45b&sectionId=8052fb27-6cf8-4a0f-a75e-32e7f02d1def&locale=en&_set_bev_on_new_domain=1704693842_MDVmMDVjZDFlMDVj&modal=REVIEWS">Soyeon</a></strong><span>Guest</span></p>
                        </div>
				</div>

                <div class="testimonial testimonial-style-3">
                <blockquote>
                            <p class="mb-0">Wow what a great day out with the team! We enjoyed a private tour for 2 and the team was very attentive and helpful. We were picked up on time and also allowed a little extra time on Gili T for lunch. A huge bonus is the great underwater videos and photos the team provide after the trip! So many lovely memories! We loved it so much we have already recommended to friends we met in our hotel!</p>
                        </blockquote>
                        <div class="testimonial-arrow-down"></div>
                        <div class="testimonial-author pb-3">
                            <div class="testimonial-author-thumbnail">
                                <img src="{{ asset('assets/frontend/img/clients/99.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <p><strong class="font-weight-extra-bold"><a href="https://www.airbnb.com/experiences/3854605?location=Gili%20Trawangan%2C%20Gili%20Indah%2C%20North%20Lombok%20Regency%2C%20West%20Nusa%20Tenggara%2C%20Indonesia&currentTab=experience_tab&federatedSearchId=3bffbc1d-34fa-4022-8eec-fa797b6f23b0&searchId=8a33b3bd-9b7b-4f89-9284-554f1a32e45b&sectionId=8052fb27-6cf8-4a0f-a75e-32e7f02d1def&locale=en&_set_bev_on_new_domain=1704693842_MDVmMDVjZDFlMDVj&modal=REVIEWS">Melissa</a></strong><span>Guest</span></p>
                        </div>
				</div>

                <div class="testimonial testimonial-style-3">
                <blockquote>
                            <p class="mb-0">La experiencia ha sido muy buena, hemos ido a las estatuas de gili meno, al turtle point y a ver un barco que hay en el fondo del mar. No le pongo 5 estrellas porque el equipo de buceo era bastante malo.</p>
                        </blockquote>
                        <div class="testimonial-arrow-down"></div>
                        <div class="testimonial-author pb-3">
                            <div class="testimonial-author-thumbnail">
                                <img src="{{ asset('assets/frontend/img/clients/10.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <p><strong class="font-weight-extra-bold"><a href="https://www.airbnb.com/experiences/3854605?location=Gili%20Trawangan%2C%20Gili%20Indah%2C%20North%20Lombok%20Regency%2C%20West%20Nusa%20Tenggara%2C%20Indonesia&currentTab=experience_tab&federatedSearchId=3bffbc1d-34fa-4022-8eec-fa797b6f23b0&searchId=8a33b3bd-9b7b-4f89-9284-554f1a32e45b&sectionId=8052fb27-6cf8-4a0f-a75e-32e7f02d1def&locale=en&_set_bev_on_new_domain=1704693842_MDVmMDVjZDFlMDVj&modal=REVIEWS">María</a></strong><span>Guest</span></p>
                        </div>
				</div>




			</div>
		</div>
    </div-->
    <br><br>
@endsection
