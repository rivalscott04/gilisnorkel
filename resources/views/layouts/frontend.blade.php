<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Gili Snorkeling | The Best Private Snorkeling Tour at Gili Island</title>

    <meta name="gili, trawangan, meno, air, snorkeling, lombok" content="HTML5 Template" />
    <meta name="The Best Private Snorkeling Tour at Gili Island" content="Gili Snorkeling">
    <meta name="RN" content="GiliSnorkeling">
    <meta name="google-site-verification" content="7gw3YiAo8taMtVsTa8aO3lcZ3JP9dpOdX0OmTqTLWgY" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon/favicon.png') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme-elements.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme-blog.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme-shop.css') }}">--}}

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/rs-plugin/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/rs-plugin/css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/circle-flip-slideshow/css/component.css') }}">
    @stack('frontend-css')

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/default.css') }}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('assets/frontend/vendor/modernizr/modernizr.min.js') }}"></script>

</head>
<body>

<div class="body">
    @include('frontend.header')

    <div role="main" class="main">
        @yield('content')


    </div>
    @include('frontend.footer')
</div>

<!-- Vendor -->
<script src="{{ asset('assets/frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/popper/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/common/common.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/isotope/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/vide/jquery.vide.min.js') }}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ asset('assets/frontend/js/theme.js') }}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{ asset('assets/frontend/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js') }}"></script>
{{--<script src="js/views/view.home.js"></script>--}}
@stack('frontend-js')

<!-- Theme Initialization Files -->
<script src="{{ asset('assets/frontend/js/theme.init.js') }}"></script>
<script>
    function formatNumber(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
</script>

</body>
</html>
