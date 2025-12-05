@extends('layouts.frontend_gsbaru')

@section('content')
    <div class="hero_in cart_section">
        <div class="wrapper">
            <div class="container">
                <div class="bs-wizard clearfix">
                    <div class="bs-wizard-step active">
                        <div class="text-center bs-wizard-stepnum">Your cart</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#0" class="bs-wizard-dot"></a>
                    </div>

                    <div class="bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum">Payment</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#0" class="bs-wizard-dot"></a>
                    </div>

                    <div class="bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum">Finish!</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#0" class="bs-wizard-dot"></a>
                    </div>
                </div>
                <!-- End bs-wizard -->
            </div>
        </div>
    </div>
    <!--/hero_in-->

    <div class="bg_color_1">
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box_cart">
                        @include('includes.error_alert')
                        
                        <table class="table cart-list">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Departure Date</th>
                                    <th>Number of Guests</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <div class="thumb_cart">
                                                <img src="{{ asset('gsbaru/img/thumb_cart_1.jpg') }}" alt="Image">
                                            </div>
                                            <span class="item_cart" id="cart_package_name" style="margin: 0 0 0 15px;">
                                                @php
                                                    $paketSelected = $paket->firstWhere('id', $selectedPaket);
                                                @endphp
                                                @if($paketSelected)
                                                    {{ $paketSelected->nama }}
                                                @else
                                                    Select Package
                                                @endif
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <span id="cart_departure_date">-</span>
                                    </td>
                                    <td>
                                        <div style="display: flex; align-items: center; justify-content: center; gap: 8px;">
                                            <strong id="cart_participants">{{ old('adult', $adults ?? 1) }} Participants</strong>
                                            <a href="#edit-participant-dialog" id="edit_cart_btn" class="edit-participant-trigger" title="Edit number of participants" style="color: #0054a6; text-decoration: none; opacity: 0.7; transition: opacity 0.3s;">
                                                <i class="icon-edit" style="font-size: 16px;"></i>
                                            </a>
                                        </div>
                                        <span id="person_limit_message" class="text-danger d-none" style="display: block; margin-top: 5px; font-size: 12px;"></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <form class="form-horizontal form-bordered" method="post" action="{{ route('frontend.booking.store') }}" id="form-booking" novalidate>
                            @csrf
                            @method('post')
                            
                            @php
                                $paketSelected = $paket->firstWhere('id', $selectedPaket);
                            @endphp
                            
                            <input type="hidden" name="nomor" value="{{ time().mt_rand(100,999) }}" required>
                            <input type="hidden" name="paket_id" id="paket_id" value="{{ $paketSelected ? $paketSelected->id : '' }}">
                            <input type="hidden" id="paket_harga_id" name="paket_harga_id" required>
                            <input type="hidden" id="adult" name="adult" value="{{ old('adult', $adults ?? 1) }}">
                            <input type="hidden" id="total_person" name="total_person" value="{{ old('adult', $adults ?? 1) }}">
                            <input type="hidden" id="harga" name="harga" value="">

                            <div class="form_title" style="margin-top: 30px; margin-bottom: 25px; padding-top: 10px;">
                                <h3><strong style="top: 5px !important;">1</strong>Your Details</h3>
                            </div>
                            <div class="step">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama') }}" placeholder="Enter your full name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="email" id="email" name="email" class="form-control" required value="{{ old('email') }}" placeholder="your.email@example.com">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Phone Number <span class="text-danger">*</span></label>
                                            <input type="tel" id="nomor_telp" name="nomor_telp" class="form-control" required value="{{ old('nomor_telp') }}" placeholder="e.g. 081234567890" minlength="8" maxlength="15" pattern="[0-9]*" inputmode="numeric">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Nationality <span class="text-danger">*</span></label>
                                            <div class="nationality-autocomplete-wrapper" style="position: relative;">
                                                <input type="text" 
                                                       class="form-control" 
                                                       id="nationality" 
                                                       name="nationality" 
                                                       required 
                                                       value="{{ old('nationality') }}" 
                                                       placeholder="Type to search your country..."
                                                       autocomplete="off"
                                                       data-valid-nationalities='@json(config('nationalities'))'>
                                                <div id="nationality-suggestions" class="nationality-suggestions" style="display: none;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Departure Date <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="tgl_kedatangan" id="tgl_kedatangan" required value="{{ old('tgl_kedatangan', $date ?? '') }}" placeholder="Select departure date" readonly>
                                            <small class="text-muted">Please select your preferred departure date</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!--End step -->

                            <div class="form_title" style="margin-top: 30px; margin-bottom: 25px; padding-top: 10px;">
                                <h3><strong style="top: 5px !important;">2</strong>Starting Time</h3>
                            </div>
                            <div class="step">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Select Starting Time <span class="text-danger">*</span></label>
                                            <div class="custom-select-form">
                                                <select class="wide add_bottom_15" name="jam_id" id="jam_id" required>
                                                    <option value="" selected>Select starting time</option>
                                                </select>
                                            </div>
                                            <small class="text-muted">Please select your preferred starting time</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!--End step -->

                            <div class="form_title" style="margin-top: 30px; margin-bottom: 25px; padding-top: 10px;">
                                <h3><strong style="top: 5px !important;">3</strong>Payment Method</h3>
                            </div>
                            <div class="step">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Select Payment Method <span class="text-danger">*</span></label>
                                            <div class="custom-select-form">
                                                <select class="wide add_bottom_15" name="bank_account_id" id="bank_account_id" required>
                                                    <option value="" selected>Select your payment method</option>
                                                    @foreach($bankAccount as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!--End step -->
                            
                            <div id="policy">
                                <h5>Cancellation policy</h5>
                                <ul>
                                    <li>If you cancel up to 7 days before the Experience start time, or within 24 hours of booking provided the booking was made more than 48 hours before the Experience start time, you will get a full refund.</li>
                                    <li>Cancellation made by customers on the same day they make booking for any reason is non-refundable.</li>
                                    <li>Customers who don't show up on the day of tour departure is not-refundable.</li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /col -->

                <aside class="col-lg-4" id="sidebar">
                    <div class="box_detail">
                        <div id="total_cart">
                            Total <span class="float-end" id="sidebar_total_price">Rp. 0</span>
                        </div>
                        <ul class="cart_details">
                            <li>Item <span id="sidebar_package_name">
                                @if($paketSelected)
                                    {{ $paketSelected->nama }}
                                @else
                                    Select Package
                                @endif
                            </span></li>
                            <li>Departure <span id="sidebar_departure_date">-</span></li>
                            <li>Participants <span id="sidebar_participants">{{ old('adult', $adults ?? 1) }}</span></li>
                        </ul>
                        <button type="submit" form="form-booking" class="btn_1 full-width purchase">Checkout</button>
                        <div class="text-center"><small>No money charged in this step</small></div>
                    </div>
                </aside>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_color_1 -->

    <!-- Edit Participant Modal -->
    <div id="edit-participant-dialog" class="zoom-anim-dialog mfp-hide">
        <div class="small-dialog-header">
            <h3>Edit Number of Participants</h3>
        </div>
        <form id="edit-participant-form">
            <div class="sign-in-wrapper">
                <div class="form-group" style="margin-bottom: 25px;">
                    <label for="edit_participant_input" style="font-weight: 500; margin-bottom: 10px; display: block; color: #333;">Number of Participants</label>
                    <div style="position: relative;">
                        <i class="icon_group" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #999; font-size: 20px; z-index: 1; pointer-events: none;"></i>
                        <input type="number" class="form-control" id="edit_participant_input" min="1" required style="padding-left: 45px; height: 48px; font-size: 16px; border: 1px solid #ddd; border-radius: 4px; transition: all 0.3s;">
                    </div>
                    <small class="text-muted" id="edit_participant_hint" style="display: block; margin-top: 10px; font-size: 13px; color: #666;">Minimum: 1 participant</small>
                    <span id="edit_participant_error" class="text-danger small d-none" style="display: block; margin-top: 8px; font-size: 13px; font-weight: 500;"></span>
                </div>
                <div style="margin-top: 30px;">
                    <button type="submit" class="btn_1 full-width" style="margin-bottom: 12px; padding: 12px; font-size: 15px; font-weight: 500;">Update Participants</button>
                    <a href="#" class="btn_1 full-width outline" onclick="$.magnificPopup.close(); return false;" style="padding: 12px; font-size: 15px; font-weight: 500; text-align: center; display: block;">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <!-- /Edit Participant Modal -->
@endsection

@push('frontend-css')
    <style>
        /* Edit Participant Modal Styling */
        #edit-participant-dialog {
            background: #fff;
            padding: 30px;
            padding-top: 0;
            text-align: left;
            max-width: 420px;
            margin: 40px auto;
            position: relative;
            box-sizing: border-box;
            border-radius: 4px;
        }
        
        #edit-participant-dialog .mfp-close {
            color: #666;
            background-color: #e4e4e4;
            border-radius: 50%;
            top: 12px;
            right: 20px;
            width: 32px;
            height: 32px;
            line-height: 32px;
        }
        
        #edit-participant-dialog .mfp-close:hover {
            color: #fff;
            background-color: #66676b;
        }
        
        #edit-participant-dialog .mfp-close {
            font-size: 0;
            line-height: 1;
        }
        
        #edit-participant-dialog .mfp-close:before {
            font-size: 24px;
            font-family: "ElegantIcons";
            content: "M";
            display: block;
        }
        
        /* Hide any text content inside close button */
        #edit-participant-dialog .mfp-close * {
            display: none !important;
        }
        
        /* Hide duplicate close buttons */
        #edit-participant-dialog .mfp-close ~ .mfp-close {
            display: none !important;
        }
        
        /* Ensure only one close button is visible */
        #edit-participant-dialog .mfp-close:not(:first-of-type) {
            display: none !important;
        }
        
        #edit-participant-dialog .form-group input.form-control:focus {
            border-color: #0054a6;
            box-shadow: 0 0 0 0.2rem rgba(0, 84, 166, 0.15);
            outline: none;
        }
        
        #edit-participant-dialog .form-group input.form-control.is-invalid {
            border-color: #dc3545;
        }
        
        #edit-participant-dialog .form-group input.form-control.is-invalid:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
        }
        
        #edit-participant-dialog .btn_1.outline {
            background: transparent;
            border: 2px solid #ddd;
            color: #666;
        }
        
        #edit-participant-dialog .btn_1.outline:hover {
            background: #f8f9fa;
            border-color: #bbb;
            color: #333;
        }
        
        /* Edit button hover effect in cart table */
        #edit_cart_btn:hover {
            opacity: 1 !important;
            color: #fc5b62 !important;
        }
        
        #edit_cart_btn i.icon-edit {
            transition: transform 0.2s;
        }
        
        #edit_cart_btn:hover i.icon-edit {
            transform: scale(1.1);
        }
        
        /* Nationality Autocomplete Styles */
        .nationality-autocomplete-wrapper {
            position: relative;
        }
        
        .nationality-suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 4px 4px;
            max-height: 300px;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: -1px;
        }
        
        .nationality-suggestion-item {
            padding: 12px 15px;
            cursor: pointer;
            border-bottom: 1px solid #f0f0f0;
            transition: background-color 0.2s;
        }
        
        .nationality-suggestion-item:hover,
        .nationality-suggestion-item.highlighted {
            background-color: #f8f9fa;
        }
        
        .nationality-suggestion-item:last-child {
            border-bottom: none;
        }
        
        .nationality-suggestion-item .highlight {
            font-weight: 600;
            color: #0054a6;
        }
        
        .nationality-suggestions.empty {
            padding: 15px;
            text-align: center;
            color: #999;
            font-style: italic;
        }
        
        #nationality.is-invalid {
            border-color: #dc3545;
        }
        
        #nationality.is-valid {
            border-color: #28a745;
        }
    </style>
@endpush

@push('frontend-js')
    @php
        $paketMeta = $paket->mapWithKeys(function($p){
            return [
                $p->id => [
                    'nama' => $p->nama,
                    'max_person' => $p->max_person ?? 1,
                    'harga_per_person' => $p->harga_per_person ?? 0,
                    'harga' => $p->paketHarga->map(function($h){
                        return [
                            'id' => $h->id,
                            'keterangan' => $h->keterangan,
                            'harga' => $h->harga,
                            'min_person' => $h->min_person ?? 1,
                            'max_person' => $h->max_person,
                        ];
                    })->values(),
                    'jam' => $p->jam->map(function($j){
                        return [
                            'id' => $j->id,
                            'nama' => $j->nama,
                        ];
                    })->values(),
                ]
            ];
        });
    @endphp
    
    <script>
        var preferredAdults = @json(request('adults'));
        @if(isset($date) && $date)
            var preferredDate = '{{ $date }}';
        @elseif(request('date'))
            var preferredDate = '{{ request('date') }}';
        @else
            var preferredDate = null;
        @endif
        var paketMeta = @json($paketMeta);
        
        // Local helper to format number
        function formatNumberLocal(nStr) {
            if (nStr === undefined || nStr === null || nStr === '') return '0';
            nStr = String(nStr).replace(/[^0-9.]/g, '');
            var parts = nStr.split('.');
            var x1 = parts[0];
            var x2 = parts.length > 1 ? '.' + parts[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return 'Rp. ' + x1 + x2;
        }

        // Datepicker initialization using daterangepicker (single date mode)
        $(document).ready(function(){
            // Initialize daterangepicker for departure date (single date picker)
            if($('#tgl_kedatangan').length > 0 && typeof $.fn.daterangepicker !== 'undefined') {
                $('#tgl_kedatangan').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    autoUpdateInput: false,
                    minDate: new Date(),
                    locale: {
                        format: 'YYYY-MM-DD',
                        cancelLabel: 'Clear'
                    }
                }).on('apply.daterangepicker', function(ev, picker) {
                    var selectedDate = picker.startDate.format('YYYY-MM-DD');
                    $(this).val(selectedDate);
                    updateCartDisplay();
                }).on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                    updateCartDisplay();
                });

                // Set date from parameter if exists
                if(preferredDate && preferredDate !== null && preferredDate !== '' && preferredDate !== 'null'){
                    var dateValue = String(preferredDate).trim();
                    if(dateValue.length > 0 && dateValue.match(/^\d{4}-\d{2}-\d{2}$/)) {
                        $('#tgl_kedatangan').val(dateValue);
                        setTimeout(function(){
                            updateCartDisplay();
                        }, 100);
                    }
                }
            }

            // Initialize with existing values
            var adult = parseInt($("#adult").val()) || 1;
            updateTotalPerson();
            
            // Apply paket data if paket is already selected
            var paketId = $("#paket_id").val();
            if(paketId){
                applyPaketData(paketId);
            }
            
            // Initial cart display update
            setTimeout(function(){
                updateCartDisplay();
            }, 200);
            
            // Nationality Autocomplete - initialize first
            if (typeof initNationalityAutocomplete === 'function') {
                initNationalityAutocomplete();
            }
            
            // Phone number - only allow numeric input
            $('#nomor_telp').on('input', function() {
                // Remove any non-numeric characters
                this.value = this.value.replace(/[^0-9]/g, '');
            });
            
            // Prevent paste non-numeric characters
            $('#nomor_telp').on('paste', function(e) {
                e.preventDefault();
                var paste = (e.originalEvent || e).clipboardData.getData('text');
                var numericOnly = paste.replace(/[^0-9]/g, '');
                this.value = numericOnly;
            });
            
            // Prevent non-numeric keypress
            $('#nomor_telp').on('keypress', function(e) {
                // Allow: backspace, delete, tab, escape, enter, decimal point
                if ([46, 8, 9, 27, 13, 110].indexOf(e.keyCode) !== -1 ||
                    // Allow: Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
                    (e.keyCode === 65 && e.ctrlKey === true) ||
                    (e.keyCode === 67 && e.ctrlKey === true) ||
                    (e.keyCode === 86 && e.ctrlKey === true) ||
                    (e.keyCode === 88 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
            
            // Initialize form validation after autocomplete is ready
            setTimeout(function() {
                if (typeof initFormValidation === 'function') {
                    initFormValidation();
                }
            }, 300);
        });
        
        // Nationality Autocomplete Function
        function initNationalityAutocomplete() {
            var $input = $('#nationality');
            var $suggestions = $('#nationality-suggestions');
            var nationalities = JSON.parse($input.attr('data-valid-nationalities') || '[]');
            var selectedIndex = -1;
            var filteredList = [];
            
            // Set initial value if exists
            var initialValue = $input.val();
            if(initialValue) {
                var trimmedInitial = initialValue.trim();
                if(nationalities.indexOf(trimmedInitial) !== -1) {
                    $input.val(trimmedInitial).addClass('is-valid');
                    // Trigger validation to clear any errors
                    setTimeout(function() {
                        if ($("#form-booking").valid) {
                            var validator = $("#form-booking").validate();
                            if (validator) {
                                validator.element($input);
                            }
                        }
                    }, 100);
                }
            }
            
            function highlightMatch(text, query) {
                if (!query) return text;
                var regex = new RegExp('(' + query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&') + ')', 'gi');
                return text.replace(regex, '<span class="highlight">$1</span>');
            }
            
            function filterNationalities(query) {
                if (!query || query.length < 1) {
                    return [];
                }
                query = query.toLowerCase();
                return nationalities.filter(function(country) {
                    return country.toLowerCase().indexOf(query) !== -1;
                }).slice(0, 10); // Limit to 10 results
            }
            
            function showSuggestions(list) {
                if (list.length === 0) {
                    $suggestions.html('<div class="nationality-suggestion-item empty">No country found. Please check your spelling.</div>').show();
                    return;
                }
                
                var html = '';
                list.forEach(function(country, index) {
                    var highlighted = highlightMatch(country, $input.val());
                    html += '<div class="nationality-suggestion-item" data-index="' + index + '" data-value="' + country + '">' + highlighted + '</div>';
                });
                $suggestions.html(html).show();
                selectedIndex = -1;
            }
            
            function hideSuggestions() {
                $suggestions.hide();
                selectedIndex = -1;
            }
            
            function selectCountry(country) {
                $input.val(country);
                $input.addClass('is-valid').removeClass('is-invalid');
                hideSuggestions();
                
                // Trigger validation events
                $input.trigger('change');
                $input.trigger('blur');
                
                // Manually trigger jQuery Validate
                if ($("#form-booking").valid) {
                    $("#form-booking").valid();
                }
            }
            
            // Input event
            $input.on('input', function() {
                var query = $(this).val();
                var trimmedQuery = query.trim();
                $input.removeClass('is-valid is-invalid');
                
                if (query.length < 1) {
                    hideSuggestions();
                    return;
                }
                
                // Check if exact match with valid country
                if (nationalities.indexOf(trimmedQuery) !== -1) {
                    $input.addClass('is-valid').removeClass('is-invalid');
                    // Clear validation error if exists
                    var validator = $("#form-booking").validate();
                    if (validator) {
                        validator.element($input);
                    }
                }
                
                filteredList = filterNationalities(query);
                showSuggestions(filteredList);
            });
            
            // Click on suggestion
            $(document).on('click', '.nationality-suggestion-item', function() {
                if (!$(this).hasClass('empty')) {
                    var country = $(this).attr('data-value');
                    selectCountry(country);
                }
            });
            
            // Keyboard navigation
            $input.on('keydown', function(e) {
                if (!$suggestions.is(':visible') || filteredList.length === 0) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        return false;
                    }
                    return;
                }
                
                var $items = $suggestions.find('.nationality-suggestion-item:not(.empty)');
                
                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    selectedIndex = (selectedIndex + 1) % $items.length;
                    $items.removeClass('highlighted').eq(selectedIndex).addClass('highlighted');
                    $items.eq(selectedIndex)[0].scrollIntoView({ block: 'nearest', behavior: 'smooth' });
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    selectedIndex = selectedIndex <= 0 ? $items.length - 1 : selectedIndex - 1;
                    $items.removeClass('highlighted').eq(selectedIndex).addClass('highlighted');
                    $items.eq(selectedIndex)[0].scrollIntoView({ block: 'nearest', behavior: 'smooth' });
                } else if (e.key === 'Enter') {
                    e.preventDefault();
                    if (selectedIndex >= 0 && selectedIndex < $items.length) {
                        var country = $items.eq(selectedIndex).attr('data-value');
                        selectCountry(country);
                    } else if (filteredList.length === 1) {
                        selectCountry(filteredList[0]);
                    }
                } else if (e.key === 'Escape') {
                    hideSuggestions();
                }
            });
            
            // Hide suggestions when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.nationality-autocomplete-wrapper').length) {
                    hideSuggestions();
                }
            });
            
            // Validate on blur
            $input.on('blur', function() {
                setTimeout(function() {
                    var value = $input.val();
                    var trimmedValue = value ? value.trim() : '';
                    if (trimmedValue && nationalities.indexOf(trimmedValue) === -1) {
                        $input.addClass('is-invalid').removeClass('is-valid');
                        // Trigger jQuery Validate
                        if ($("#form-booking").valid) {
                            $("#form-booking").valid();
                        }
                    } else if (trimmedValue && nationalities.indexOf(trimmedValue) !== -1) {
                        $input.addClass('is-valid').removeClass('is-invalid');
                        // Clear any validation errors
                        var validator = $("#form-booking").validate();
                        if (validator) {
                            validator.element($input);
                        }
                    }
                }, 200);
            });
        }

        // Initialize Magnific Popup for edit participant modal
        $(document).ready(function(){
            $('.edit-participant-trigger').magnificPopup({
                type: 'inline',
                fixedContentPos: true,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                showCloseBtn: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'mfp-zoom-in',
                closeMarkup: '<button title="%title%" type="button" class="mfp-close"></button>',
                callbacks: {
                    beforeOpen: function() {
                        // Set current value and max before opening
                        var currentParticipants = parseInt($("#adult").val()) || 1;
                        var paketId = $("#paket_id").val();
                        
                        // Set current value
                        $("#edit_participant_input").val(currentParticipants);
                        
                        // Update max and hint based on selected paket
                        if(paketId && paketMeta && paketMeta[String(paketId)]){
                            var maxPerson = paketMeta[String(paketId)].max_person || 1;
                            $("#edit_participant_input").attr('max', maxPerson);
                            $("#edit_participant_hint").text('Minimum: 1 participant, Maximum: ' + maxPerson + ' participants');
                        } else {
                            $("#edit_participant_input").removeAttr('max');
                            $("#edit_participant_hint").text('Minimum: 1 participant');
                        }
                        
                        // Clear previous error
                        $("#edit_participant_error").addClass('d-none').text('');
                        $("#edit_participant_input").removeClass('is-invalid');
                    },
                    open: function() {
                        // Remove duplicate close buttons if any
                        setTimeout(function() {
                            var closeButtons = $('#edit-participant-dialog').find('.mfp-close');
                            if(closeButtons.length > 1) {
                                closeButtons.not(':first').remove();
                            }
                            // Remove any text content from close button (keep only CSS :before icon)
                            $('#edit-participant-dialog .mfp-close').html('');
                        }, 10);
                    }
                }
            });
        });

        // Validate participant input in real-time
        $('#edit_participant_input').on('input change blur', function(){
            var value = parseInt($(this).val()) || 0;
            var paketId = $("#paket_id").val();
            var errorEl = $("#edit_participant_error");
            var inputEl = $(this);
            
            // Clear previous error
            errorEl.addClass('d-none').text('');
            inputEl.removeClass('is-invalid');
            
            // Validate minimum
            if(value < 1){
                errorEl.removeClass('d-none').text('Please enter at least 1 participant.');
                inputEl.addClass('is-invalid');
                return false;
            }
            
            // Validate maximum
            if(paketId && paketMeta && paketMeta[String(paketId)]){
                var maxPerson = paketMeta[String(paketId)].max_person || 1;
                if(value > maxPerson){
                    errorEl.removeClass('d-none').text('Maximum ' + maxPerson + ' participants allowed for this package.');
                    inputEl.addClass('is-invalid');
                    return false;
                }
            }
            
            // Valid - remove error state
            inputEl.removeClass('is-invalid');
            return true;
        });

        // Handle form submission
        $('#edit-participant-form').on('submit', function(e){
            e.preventDefault();
            
            var newValue = parseInt($("#edit_participant_input").val()) || 0;
            var paketId = $("#paket_id").val();
            var errorEl = $("#edit_participant_error");
            var inputEl = $("#edit_participant_input");
            
            // Validate
            if(newValue < 1){
                errorEl.removeClass('d-none').text('Please enter at least 1 participant.');
                inputEl.addClass('is-invalid');
                return false;
            }
            
            if(paketId && paketMeta && paketMeta[String(paketId)]){
                var maxPerson = paketMeta[String(paketId)].max_person || 1;
                if(newValue > maxPerson){
                    errorEl.removeClass('d-none').text('Maximum ' + maxPerson + ' participants allowed for this package.');
                    inputEl.addClass('is-invalid');
                    return false;
                }
            }
            
            // Update values
            $("#adult").val(newValue);
            updateTotalPerson();
            applyPaketData(paketId);
            updateCartDisplay();
            
            // Close modal
            $.magnificPopup.close();
            
            return false;
        });

        function updateCartDisplay(){
            var paketId = $("#paket_id").val();
            var departureDate = $("#tgl_kedatangan").val();
            var participants = parseInt($("#adult").val()) || 1;
            var totalPrice = calculateTotalPrice();
            
            // Update cart table
            if(departureDate && departureDate !== ''){
                try {
                    var dateObj = new Date(departureDate + 'T00:00:00');
                    if(!isNaN(dateObj.getTime())){
                        var formattedDate = dateObj.toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
                        $("#cart_departure_date").text(formattedDate);
                        $("#sidebar_departure_date").text(formattedDate);
                    } else {
                        $("#cart_departure_date").text(departureDate);
                        $("#sidebar_departure_date").text(departureDate);
                    }
                } catch(e) {
                    $("#cart_departure_date").text(departureDate);
                    $("#sidebar_departure_date").text(departureDate);
                }
            } else {
                $("#cart_departure_date").text('-');
                $("#sidebar_departure_date").text('-');
            }
            
            $("#cart_participants").text(participants + ' Participant' + (participants > 1 ? 's' : ''));
            $("#sidebar_participants").text(participants);
            
            // Update package name
            if(paketId && paketMeta && paketMeta[String(paketId)]){
                var packageName = paketMeta[String(paketId)].nama;
                $("#cart_package_name").text(packageName);
                $("#sidebar_package_name").text(packageName);
            }
            
            // Update total price
            $("#sidebar_total_price").text(formatNumberLocal(totalPrice));
        }

        function calculateTotalPrice(){
            var paketId = $("#paket_id").val();
            var paketHargaId = $("#paket_harga_id").val();
            var totalPerson = parseInt($("#total_person").val()) || parseInt($("#adult").val()) || 1;
            
            if(paketId && paketMeta && paketMeta[String(paketId)]){
                var meta = paketMeta[String(paketId)];
                var hargaPerPerson = parseInt(meta.harga_per_person) || 0;
                return hargaPerPerson * totalPerson;
            }
            return 0;
        }

        function applyPaketData(paketId){
            if(!paketId){
                return;
            }
            
            var meta = paketMeta && paketMeta[String(paketId)] ? paketMeta[String(paketId)] : {};
            var hargaArr = meta.harga || [];
            var jamArr = meta.jam || [];
            
            // Update starting time dropdown
            // Destroy Nice Select first if it exists
            if(typeof $.fn.niceSelect !== 'undefined' && $("#jam_id").next('.nice-select').length > 0){
                $("#jam_id").niceSelect('destroy');
            }
            
            $("#jam_id").empty().append('<option value="" selected>Select starting time</option>');
            if(jamArr.length > 0){
                $.each(jamArr, function(idx, item){
                    $("#jam_id").append('<option value="' + item.id + '">' + item.nama + '</option>');
                });
                
                // Select first option as default
                if(jamArr.length > 0){
                    $("#jam_id").val(jamArr[0].id);
                }
            }
            
            // Re-initialize Nice Select after updating options
            if(typeof $.fn.niceSelect !== 'undefined'){
                $("#jam_id").niceSelect();
            }
            
            // Handle paket_harga_id selection
            if(hargaArr.length > 0){
                $('#paket_harga_id_hidden').remove();
                var $hiddenSelect = $('<select id="paket_harga_id_hidden" style="display:none;"></select>');
                $.each(hargaArr, function(idx, item){
                    $hiddenSelect.append("<option value='"+item.id+"' data-harga='"+item.harga+"' data-min-person='"+item.min_person+"' data-max-person='"+item.max_person+"'>"+item.keterangan+"</option>");
                });
                $('body').append($hiddenSelect);
                
                var adult = parseInt($("#adult").val()) || 0;
                var totalPerson = adult;
                $("#total_person").val(totalPerson);
                
                // Find best match for paket_harga_id
                var bestMatch = null;
                var exactMatch = null;
                var bestMinPerson = -1;
                
                if(totalPerson > 0){
                    // Look for exact match first
                    $('#paket_harga_id_hidden option').each(function(){
                        var $option = $(this);
                        var minPerson = parseInt($option.attr('data-min-person')) || 1;
                        var maxPersonAttr = $option.attr('data-max-person');
                        var maxPerson = (maxPersonAttr && maxPersonAttr !== 'null' && maxPersonAttr !== '') ? parseInt(maxPersonAttr) : null;
                        
                        if(minPerson === totalPerson || maxPerson === totalPerson){
                            if(!exactMatch){
                                exactMatch = {
                                    id: $option.val(),
                                    harga: $option.attr('data-harga'),
                                    text: $option.text()
                                };
                            }
                        }
                    });
                    
                    if(exactMatch){
                        bestMatch = exactMatch;
                    } else {
                        // Find best fit
                        $('#paket_harga_id_hidden option').each(function(){
                            var $option = $(this);
                            var minPerson = parseInt($option.attr('data-min-person')) || 1;
                            var maxPersonAttr = $option.attr('data-max-person');
                            var maxPerson = (maxPersonAttr && maxPersonAttr !== 'null' && maxPersonAttr !== '') ? parseInt(maxPersonAttr) : null;
                            
                            var isMatch = false;
                            if(totalPerson >= minPerson){
                                if(maxPerson === null || maxPersonAttr === 'null' || maxPersonAttr === ''){
                                    isMatch = true;
                                } else if(totalPerson <= maxPerson){
                                    isMatch = true;
                                }
                            }
                            
                            if(isMatch && minPerson <= totalPerson && minPerson > bestMinPerson){
                                bestMatch = {
                                    id: $option.val(),
                                    harga: $option.attr('data-harga'),
                                    text: $option.text()
                                };
                                bestMinPerson = minPerson;
                            }
                        });
                    }
                    
                    // Set paket_harga_id
                    if(bestMatch){
                        $("#paket_harga_id").val(bestMatch.id);
                        updatePersonLimits();
                    } else {
                        // Fallback to first option
                        var firstOption = $('#paket_harga_id_hidden option').first();
                        if(firstOption.length > 0 && firstOption.val()){
                            $("#paket_harga_id").val(firstOption.val());
                            updatePersonLimits();
                        }
                    }
                }
            }
            
            // Update price and display
            showPrice();
            updateCartDisplay();
        }

        function showPrice(){
            var paketId = $("#paket_id").val();
            var paketHargaId = $("#paket_harga_id").val();
            if(paketId && paketHargaId){
                var meta = paketMeta && paketMeta[String(paketId)] ? paketMeta[String(paketId)] : {};
                var hargaPerPerson = parseInt(meta.harga_per_person) || 0;
                var totalPerson = parseInt($("#total_person").val()) || parseInt($("#adult").val()) || 1;
                var totalHarga = hargaPerPerson * totalPerson;
                // Update hidden harga field for form submission
                $("#harga").val(totalHarga);
                updateCartDisplay();
            }
        }

        function updateTotalPerson(){
            var adult = parseInt($("#adult").val()) || 0;
            var total = adult;
            $("#total_person").val(total);
            validatePersonCount();
            updateCartDisplay();
        }

        function updatePersonLimits(){
            var paketHargaId = $("#paket_harga_id").val();
            if(paketHargaId){
                var selectedOption = $('#paket_harga_id_hidden option[value="' + paketHargaId + '"]');
                var minPerson = selectedOption.attr('data-min-person') || 1;
                var maxPerson = selectedOption.attr('data-max-person');
                
                $("#adult").data('min-person', minPerson);
                $("#adult").data('max-person', maxPerson);
                
                validatePersonCount();
            }
        }

        function validatePersonCount(){
            var adult = parseInt($("#adult").val()) || 0;
            var total = adult;
            var minPerson = parseInt($("#adult").data('min-person')) || 1;
            var maxPerson = $("#adult").data('max-person');
            
            var messageEl = $("#person_limit_message");
            messageEl.addClass('d-none');
            
            if(total < minPerson){
                messageEl.removeClass('d-none').text('Minimum ' + minPerson + ' participant(s) required for this option.');
                return false;
            }
            
            if(maxPerson && total > parseInt(maxPerson)){
                messageEl.removeClass('d-none').text('Maximum ' + maxPerson + ' participant(s) allowed for this option.');
                return false;
            }
            
            return true;
        }

        // Form validation initialization
        function initFormValidation() {
            // Wait a bit to ensure jQuery Validate is loaded
            if (typeof $.fn.validate === 'undefined') {
                console.error('jQuery Validate plugin is not loaded. Please check if the plugin script is included.');
                return;
            }
            
            // Add custom validator for nationality
            $.validator.addMethod("validNationality", function(value, element) {
                if (!value) {
                    return false;
                }
                var trimmedValue = value.toString().trim();
                if (trimmedValue === '') {
                    return false;
                }
                try {
                    var nationalitiesStr = $(element).attr('data-valid-nationalities');
                    if (!nationalitiesStr) {
                        return false;
                    }
                    var nationalities = JSON.parse(nationalitiesStr);
                    if (!Array.isArray(nationalities)) {
                        return false;
                    }
                    var isValid = nationalities.indexOf(trimmedValue) !== -1;
                    return isValid;
                } catch(e) {
                    console.error('Error parsing nationalities:', e);
                    return false;
                }
            }, "Please select a valid country from the list.");
            
            $("#form-booking").validate({
            focusInvalid: false,
            invalidHandler: function(event, validator) {
                // Validasi semua field dan tampilkan semua error sekaligus
                var errors = validator.numberOfInvalids();
                if (errors) {
                    // Scroll ke field pertama yang error
                    var firstError = $(validator.errorList[0].element);
                    if (firstError.length) {
                        $('html, body').animate({
                            scrollTop: firstError.offset().top - 100
                        }, 500);
                    }
                }
            },
            rules: {
                nama: { required: true },
                email: { required: true, email: true },
                nomor_telp: { required: true, minlength: 8, maxlength: 15, digits: true },
                tgl_kedatangan: { required: true },
                paket_harga_id: { required: true },
                bank_account_id: { required: true },
                jam_id: { required: true },
                nationality: { required: true, validNationality: true },
                adult: { required: true, digits: true, min: 1 }
            },
            messages: {
                nama: { required: "Please provide your full name." },
                email: { required: "Please provide your email address.", email: "Please enter a valid email address." },
                nomor_telp: { required: "Please provide your phone number.", minlength: "Phone number must be at least 8 digits.", maxlength: "Phone number cannot exceed 15 digits.", digits: "Phone number must contain numbers only." },
                tgl_kedatangan: { required: "Please select your departure date." },
                paket_harga_id: { required: "Please select a participant option." },
                bank_account_id: { required: "Please select a payment method." },
                jam_id: { required: "Please select a starting time." },
                nationality: { required: "Please select your nationality.", validNationality: "Please select a valid country from the list." },
                adult: { required: "Please enter the number of participants.", digits: "Please enter a valid number.", min: "Minimum 1 participant is required." }
            },
            errorElement: "span",
            errorClass: "text-danger small",
            errorPlacement: function(error, element) {
                // Tampilkan error di bawah field
                if (element.attr('id') === 'nationality') {
                    // Untuk nationality autocomplete, tampilkan di bawah wrapper
                    error.insertAfter(element.closest('.nationality-autocomplete-wrapper'));
                } else if (element.parent().hasClass('custom-select-form')) {
                    // Untuk select dengan custom select
                    error.insertAfter(element.parent());
                } else {
                    // Untuk input biasa
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                // Pastikan paket_harga_id sudah ada sebelum submit
                if(!$("#paket_harga_id").val()){
                    var paketId = $("#paket_id").val();
                    if(paketId){
                        applyPaketData(paketId);
                        setTimeout(function(){
                            if($("#paket_harga_id").val()){
                                // Langsung submit form ke endpoint booking (logika lama)
                                form.submit();
                            } else {
                                alert('Please select a participant option first.');
                            }
                        }, 200);
                        return false;
                    } else {
                        alert('Please select a package first.');
                        return false;
                    }
                }
                // Langsung submit form ke endpoint booking (logika lama - langsung hit endpoint)
                form.submit();
            }
            });
        } // End initFormValidation function

    </script>
@endpush
