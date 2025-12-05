<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('assets/libs/jquery/jquery.js')}}"></script>
<script src="{{ asset('assets/libs/popper/popper.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.js')}}"></script>
<script src="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{ asset('assets/libs/hammer/hammer.js')}}"></script>

<script src="{{ asset('assets/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js')}}"></script>

<!-- Page JS -->
@stack('js')
