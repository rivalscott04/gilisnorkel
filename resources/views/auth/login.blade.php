<!DOCTYPE html>

<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('assets') }}/"
    data-template="vertical-menu-template"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>{{ config('app.name') }} | Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
{{--    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />--}}

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/libs/typeahead-js/typeahead.css') }}" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('assets/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('assets/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
<!-- Content -->

<div class="authentication-wrapper authentication-cover">
    <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
            <div class="flex-row text-center mx-auto">
                <img
                    src="{{ asset('assets/img/pages/login-light.png') }}"
                    alt="Auth Cover Bg color"
                    width="520"
                    class="img-fluid authentication-cover-img"
                    data-app-light-img="pages/login-light.png"
                    data-app-dark-img="pages/login-dark.png"
                />
                <div class="mx-auto">
                    <h3>Discover lombok with us 🥳</h3>
                    <p>
                        Perfectly suited for all level of travelers which helps you to <br />
                        explore your next destinations be more excited.
                    </p>
                </div>
            </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
                <!-- Logo -->
                <div class="app-brand mb-4">
                    <a href="" class="app-brand-link gap-2 mb-2">
                <span class="app-brand-logo ">
                  <img src="{{ asset('assets/img/favicon/favicon.png') }}" alt="" class="img-fluid" >
                </span>
                        <span class="app-brand-text h3 mb-0 fw-bold"><span class="text-logo-orange">Gili</span> <span class="text-logo-green">Snorkeling </span></span>
                    </a>
                </div>
                <!-- /Logo -->
                <h4 class="mb-2">Welcome!</h4>
                <p class="mb-4">Please sign-in to your account.</p>

                <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Username</label>
                        <input
                            type="text"
                            class="form-control"
                            id="email"
                            name="username"
                            placeholder="Enter your username"
                            autofocus
                        />
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
                        </div>
                        <div class="input-group input-group-merge">
                            <input
                                type="password"
                                id="password"
                                class="form-control"
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password"
                            />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <button class="btn btn-primary d-grid w-100">Sign in</button>
                    </div>

                </form>


            </div>
        </div>
        <!-- /Login -->
    </div>
</div>

<!-- / Content -->

<!-- Core JS -->
<!-- build:js assets/js/core.js -->
<script src="{{ asset('assets/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('assets/libs/hammer/hammer.js') }}"></script>

<script src="{{ asset('assets/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('assets/libs/typeahead-js/typeahead.js') }}"></script>

<script src="{{ asset('assets/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
<script src="{{ asset('assets/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('assets/js/pages-auth.js') }}"></script>
</body>
</html>
