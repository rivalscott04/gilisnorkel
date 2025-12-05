<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gili Snorkeling | The Best Private Snorkeling Tour at Gili Island">
    <meta name="author" content="GiliSnorkeling">
    <title>{{ config('app.name', 'Gili Snorkeling') }} | The Best Private Snorkeling Tour at Gili Island</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('gsbaru/img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('gsbaru/img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('gsbaru/img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('gsbaru/img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('gsbaru/img/apple-touch-icon-144x144-precomposed.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('gsbaru/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gsbaru/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('gsbaru/css/vendors.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('gsbaru/css/custom.css') }}" rel="stylesheet">

    @stack('frontend-css')
</head>

<body class="datepicker_mobile_full">
<div id="page">

    <header class="header menu_fixed">
        <div id="preloader">
            <div data-loader="circle-side"></div>
        </div>
        <div id="logo">
            <a href="{{ route('frontend.home') }}">
                <img src="{{ asset('gsbaru/img/logo (2).png') }}" width="220" height="62" alt="" class="logo_normal">
                <img src="{{ asset('gsbaru/img/gilisnorkeling-01.png') }}" width="220" height="62" alt="" class="logo_sticky">
            </a>
        </div>
        <ul id="top_menu">
            <li>
                <a href="{{ route('frontend.booking.index') }}" class="cart-menu-btn" title="Cart">
                    <strong>0</strong>
                </a>
            </li>
        </ul>
        <a href="#menu" class="btn_mobile">
            <div class="hamburger hamburger--spin" id="hamburger">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
        </a>
        <nav id="menu" class="main-menu">
            <ul>
                <li><span><a href="{{ route('frontend.home') }}">Home</a></span></li>
                <li><span><a href="{{ route('frontend.home') }}#about-us">About Us</a></span></li>
                <li><span><a href="{{ route('frontend.gallery') }}">Gallery</a></span></li>
                <li><span><a href="{{ route('frontend.faq') }}">FAQ</a></span></li>
                <li><span><a href="{{ route('frontend.contact') }}">Contact</a></span></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-4 col-md-12 pe-5">
                    <p>
                        <img src="{{ asset('gsbaru/img/logo (2).png') }}" width="190" height="56" alt="">
                    </p>
                    <p>We work with a very professional team, and we provide work operational standards that we always prioritize. Booked through us for the fastest, safest and best priced services in Gili Islands. Don't miss your memorable experience in gili trawangan And joining with us!</p>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h5>About</h5>
                    <ul class="contacts">
                        <br>
                        <li><a href="{{ route('frontend.home') }}#about-us">About Us</a></li>
                        <li><a href="{{ route('frontend.gallery') }}">Our Gallery</a></li>
                        <li><a href="{{ route('frontend.home') }}#testimonials">Guests Reviews</a></li>
                        <li><a href="{{ route('frontend.faq') }}">FAQ's</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>Address</h5>
                    <ul class="contacts">
                        <br>
                        <li>St. Pantai Gili Trawangan <br>Gili Indah North Lombok Regency <br>West Nusa Tenggara <br>Post Code : 83352</li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 ms-lg-auto">
                    <h5>Ways you can pay</h5>
                    <img src="{{ asset('gsbaru/img/cards-01.png') }}" width="300" height="56" alt="">
                    <div class="follow_us">
                        <ul>
                            <li>Follow us</li>
                            <li><a href="#0"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="#0"><i class="bi bi-instagram"></i></a></li>
                            <li><a href="#0"><i class="bi bi-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container margin_60_35">
            <div class="row">
                <hr>
                <div class="col-12">
                    <center>
                        Our Partnership :
                        <img src="{{ asset('gsbaru/img/partners-01.png') }}" width="400" height="80" alt="">
                    </center>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h5>Gili Snorkeling | Gili Transport</h5>
                    <p>© Copyright {{ now()->year }}. The Best Private Snorkeling Tour at Gili Island. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</div>

<div id="toTop"></div>

<!-- COMMON SCRIPTS -->
<script src="{{ asset('gsbaru/js/common_scripts.js') }}"></script>
<script src="{{ asset('gsbaru/js/main.js') }}"></script>
<script src="{{ asset('gsbaru/js/jarallax.min.js') }}"></script>
<script src="{{ asset('gsbaru/js/jarallax-video.min.js') }}"></script>
<script src="{{ asset('gsbaru/js/input_qty.js') }}"></script>
<script src="{{ asset('gsbaru/phpmailer/validate.js') }}"></script>
<!-- jQuery Validate Plugin -->
<script src="{{ asset('assets/frontend/vendor/jquery.validation/jquery.validate.min.js') }}"></script>

<!-- SPECIFIC SCRIPTS -->
@stack('frontend-js')

</body>
</html>


