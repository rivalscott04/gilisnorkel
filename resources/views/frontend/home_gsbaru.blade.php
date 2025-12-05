@extends('layouts.frontend_gsbaru')

@section('content')
    <!-- Hero with step-1 booking form -->
    <div class="hero_single jarallax hero_home" data-jarallax-video="https://www.youtube.com/watch?v=N_q9tCrE2no">
        <div class="wrapper" style="background-color: rgba(0, 0, 0, 0.5);">
            <div class="container">
                <h3>Book your snorkeling<br> </h3>
                <p>At gili islands easily with us and explore the natural beauty of Gili's</p>

                <form onsubmit="return goToBooking(this);">
                    <div class="row g-0 custom-search-input-2">
                        <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
                            <div class="panel-dropdown">
                                <a href="#" id="selectedPackageLabel" class="package-trigger">Choose your package</a>
                                <div class="panel-dropdown-content">
                                    <!-- Quantity Buttons -->
                                    @foreach($paket as $item)
                                        <div class="qtyButtons">
                                            <label data-paket-id="{{ $item->id }}" data-max-person="{{ $item->max_person ?? 1 }}" onclick="selectPaket(this)">
                                                <span class="paket-name" title="{{ $item->nama }}">{{ $item->nama }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 mb-2 mb-lg-0">
                            <div class="form-group">
                                <input class="form-control" type="text" name="dates" placeholder="When...">
                                <i class="icon_calendar"></i>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 mb-2 mb-lg-0">
                            <div class="panel-dropdown">
                                <a href="#">Number of Guests <span class="qtyTotal">1</span></a>
                                <div class="panel-dropdown-content">
                                    <!-- Quantity Buttons -->
                                    <div class="qtyButtons">
                                        <label>Adults</label>
                                        <input type="text" name="qtyInput" data-role="adults" value="1" min="1" max="">
                                        <small class="text-muted d-block mt-1" id="maxPersonInfo" style="display: none !important;">Max: <span id="maxPersonValue">-</span> person(s)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <input type="submit" class="btn_search" value="Book Now">
                        </div>
                    </div>
                    <!-- hidden fields to carry selected paket and parsed date -->
                    <input type="hidden" name="selectedPaket" id="selectedPaketInput">
                    <input type="hidden" name="start_date" id="startDateInput">
                </form>
            </div>
        </div>
    </div>

    <!-- Our Popular Tour Packages (dynamic) -->
    <div class="container container-custom margin_20_0" id="main">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>Our Popular Tour Packages</h2>
            <p>Get your best experience with us</p>
        </div>
        <div class="isotope-wrapper">
            <div class="row">
                @foreach($paket as $item)
                    <div class="col-xl-4 col-lg-6 col-md-6 isotope-item popular">
                        <div class="box_grid" data-cue="slideInUp">
                            <figure>
                                <a href="{{ route('frontend.paket-detail', $item->id) }}">
                                    <img src="{{ $item->images->first()?->getFirstMediaUrl() }}"
                                         class="img-fluid"
                                         alt="{{ $item->nama }}"
                                         width="800"
                                         height="533">
                                    <div class="read_more"><span>Read more</span></div>
                                </a>
                                <small>Popular</small>
                            </figure>
                            <div class="wrapper">
                                <h3>
                                    <a href="{{ route('frontend.paket-detail', $item->id) }}">
                                        <b>{{ $item->nama }}</b>
                                    </a>
                                </h3>
                                <p>{!! \Illuminate\Support\Str::limit(strip_tags($item->deskripsi ?? ''), 140) !!}</p>
                                <span class="price">
                                    Start from
                                    <strong>Rp. {{ number_format($item->paketHarga->first()?->harga ?? 0) }}</strong>
                                    /per person
                                </span>
                            </div>
                            <ul>
                                <li><i class="icon_clock_alt"></i></li>
                                <li>
                                    <div class="score">
                                        <span>Snorkeling<em>Guest reviews</em></span>
                                        <a href="{{ route('frontend.paket-detail', $item->id) }}">
                                            <strong>Book Now</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- About Us anchor (kept only as scroll target for menu, content disembunyikan agar mirip demo) -->
    <div id="about-us"></div>
@endsection

@push('frontend-css')
    <style>
        /* Izinkan dropdown paket melebar di luar wrapper tanpa ketabrak section berikutnya */
        .hero_home {
            padding-bottom: 40px;
        }
        .hero_home .wrapper {
            overflow: visible;
        }

        /* Biar teks paket tidak ketimpa arrow dropdown, tapi di-ellipsis rapi */
        .panel-dropdown > a.package-trigger {
            display: block;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding-right: 40px; /* ruang untuk icon arrow di kanan */
        }
    </style>
@endpush

@push('frontend-js')
    <script>
        // Simpan max_person untuk paket yang dipilih
        var selectedPaketMaxPerson = null;

        function selectPaket(el) {
            var id = el.getAttribute('data-paket-id');
            var maxPerson = el.getAttribute('data-max-person');
            var nameEl = el.querySelector('.paket-name');
            var name = nameEl ? nameEl.textContent.trim() : '';

            document.getElementById('selectedPaketInput').value = id;
            selectedPaketMaxPerson = maxPerson ? parseInt(maxPerson) : null;

            var label = document.getElementById('selectedPackageLabel');
            if (label && name) {
                label.textContent = name;
                label.title = name; // tooltip teks penuh saat hover di trigger
            }

            // Update info max person
            var maxPersonInfo = document.getElementById('maxPersonInfo');
            var maxPersonValue = document.getElementById('maxPersonValue');
            if (maxPersonInfo && maxPersonValue && selectedPaketMaxPerson) {
                maxPersonValue.textContent = selectedPaketMaxPerson;
                maxPersonInfo.style.display = 'block';
            }

            // Set max attribute pada input
            var adultsInput = document.querySelector('input[data-role="adults"]');
            if (adultsInput && selectedPaketMaxPerson) {
                adultsInput.setAttribute('max', selectedPaketMaxPerson);
            }

            // Update validasi jumlah person setelah pilih paket
            updateQuantityButtons();
            validatePersonCount();

            // Tutup dropdown setelah memilih paket
            var panel = el.closest ? el.closest('.panel-dropdown') : null;
            if (!panel) {
                // fallback untuk browser lama
                var parent = el.parentNode;
                while (parent && !parent.classList.contains('panel-dropdown')) {
                    parent = parent.parentNode;
                }
                panel = parent;
            }
            if (panel) {
                panel.classList.remove('active');
            }
        }

        function validatePersonCount() {
            var adultsInput = document.querySelector('input[data-role="adults"]');
            if (!adultsInput || !selectedPaketMaxPerson) {
                return true;
            }

            var adults = parseInt(adultsInput.value) || 0;
            if (adults > selectedPaketMaxPerson) {
                adultsInput.value = selectedPaketMaxPerson;
                updateQtyTotal();
                updateQuantityButtons();
                return false;
            }
            updateQuantityButtons();
            return true;
        }

        function updateQuantityButtons() {
            var adultsInput = document.querySelector('input[data-role="adults"]');
            if (!adultsInput || !selectedPaketMaxPerson) {
                return;
            }

            var adults = parseInt(adultsInput.value) || 1;
            var qtyInc = document.querySelector('.qtyInc');
            
            if (qtyInc) {
                if (adults >= selectedPaketMaxPerson) {
                    qtyInc.style.opacity = '0.5';
                    qtyInc.style.cursor = 'not-allowed';
                    qtyInc.style.pointerEvents = 'none';
                } else {
                    qtyInc.style.opacity = '1';
                    qtyInc.style.cursor = 'pointer';
                    qtyInc.style.pointerEvents = 'auto';
                }
            }
        }

        function updateQtyTotal() {
            var adultsInput = document.querySelector('input[data-role="adults"]');
            var qtyTotal = document.querySelector('.qtyTotal');
            if (adultsInput && qtyTotal) {
                var adults = parseInt(adultsInput.value) || 1;
                qtyTotal.textContent = adults;
            }
        }

        function goToBooking(form) {
            var selectedId = document.getElementById('selectedPaketInput').value;
            if (!selectedId) {
                alert('Please choose your package first');
                return false;
            }

            // Validasi jumlah person sebelum submit
            if (!validatePersonCount()) {
                return false;
            }

            var url = '{{ url('/booking') }}/' + selectedId;
            var params = new URLSearchParams();
            // gunakan parameter date yang rapi (YYYY-MM-DD) dari hidden field
            if (form.start_date && form.start_date.value) {
                params.append('date', form.start_date.value);
            }

            var adultsInput = form.querySelector('input[data-role="adults"]');
            if (adultsInput && adultsInput.value) {
                params.append('adults', adultsInput.value);
            }

            const query = params.toString();
            if (query) {
                url += '?' + query;
            }

            window.location.href = url;
            return false;
        }

        // Event listener untuk validasi real-time ketika jumlah person diubah
        (function($){
            'use strict';
            $(function() {
                // Validasi ketika input adults berubah
                $('input[data-role="adults"]').on('change blur', function() {
                    validatePersonCount();
                    updateQtyTotal();
                    updateQuantityButtons();
                });

                // Update qtyTotal ketika input berubah (untuk quantity buttons)
                $('input[data-role="adults"]').on('input', function() {
                    updateQtyTotal();
                    updateQuantityButtons();
                });

                // Update quantity buttons setelah input_qty.js selesai load
                setTimeout(function() {
                    updateQuantityButtons();
                }, 500);

                // Single date picker: user pilih 1 tanggal tour, dikirim ke booking sebagai tgl_kedatangan
                if (!$('input[name=\"dates\"]').length || typeof $.fn.daterangepicker === 'undefined') {
                    return;
                }
                $('input[name=\"dates\"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    autoUpdateInput: true,
                    minDate: new Date(),
                    locale: {
                        format: 'DD MMM YYYY',
                        cancelLabel: 'Clear'
                    }
                });
                $('input[name=\"dates\"]').on('apply.daterangepicker', function(ev, picker) {
                    // tampilkan 1 tanggal yang dipilih dan simpan versi YYYY-MM-DD ke hidden field
                    $(this).val(picker.startDate.format('DD MMM YYYY'));
                    $('#startDateInput').val(picker.startDate.format('YYYY-MM-DD'));
                });
                $('input[name=\"dates\"]').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                    $('#startDateInput').val('');
                });
            });
        })(jQuery);
    </script>
@endpush


