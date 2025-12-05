@isset($paket)

@php $bankAccount = \App\Models\BankAccount::where('is_active',true)->get() @endphp
@php $jam = \App\Models\Jam::where("is_active",true)->get() @endphp

<div class="card card-border bg-primary text-white shadow">
    <div class="card-body">

        @include('includes.error_alert')
        <form class="form-horizontal form-bordered" method="post" action="{{ route('frontend.booking.store')  }}" id="form-booking">
            @csrf
            @method('post')
            <div class="row">
                
                
                <div class="col-6">
                    <h4 class="card-title mb-3 text-4 font-weight-bold">Select Participants, Date & Time</h4></h4>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6">
                            <label class="">Select Participants</label>
                            <select class="form-control" id="paket_harga_id" name="paket_harga_id" required onchange="showPrice(); updatePersonLimits();">
                                <option value="">Participants</option>
                                @foreach($paket->paketHarga as $harga)
                                    <option value="{{ $harga->id }}" data-harga="{{ $harga->harga }}" data-min-person="{{ $harga->min_person ?? 1 }}" data-max-person="{{ $harga->max_person }}"> {{ $harga->keterangan  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="">Select Date</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar-alt"></i>
                                    </span>
                                </span>
                                <input type="text" class="form-control datepicker" name="tgl_kedatangan" id="tgl_kedatangan" required readonly>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        @if(isset($adults))
                            {{-- Jika ada parameter dari home, tampilkan readonly --}}
                            <div class="form-group col-lg-12">
                                <label>Participants</label>
                                <p class="mb-0">
                                    <strong>Total Participants: <span id="total_person_display">{{ old('adult', $adults) }}</span></strong>
                                    <span id="person_limit_message" class="text-warning d-none"></span>
                                </p>
                                <input type="hidden" id="adult" name="adult" value="{{ old('adult', $adults) }}">
                                <input type="hidden" id="total_person" name="total_person" value="{{ old('adult', $adults) }}">
                                <small class="text-white-50">To change participants, please go back to the home page.</small>
                            </div>
                        @else
                            {{-- Jika tidak ada parameter, tetap bisa input manual --}}
                            <div class="form-group col-lg-12">
                                <label for="adult">Adults</label>
                                <input type="number" class="form-control" id="adult" name="adult" required min="1" value="{{ old('adult', 1) }}" onchange="updateTotalPerson(); validatePersonCount();">
                                <small class="text-white-50">Age 12+ years</small>
                            </div>
                            <div class="form-group col-lg-12">
                                <p class="mb-0">
                                    <strong>Total Participants: <span id="total_person_display">1</span></strong>
                                    <span id="person_limit_message" class="text-warning d-none"></span>
                                </p>
                                <input type="hidden" id="total_person" name="total_person" value="1">
                            </div>
                        @endif
                    </div>
                    
                     <div class="row">
                        
                        <div class="form-group col-lg-6">
                            <label for="">Total Price (Rp) :</label>
                            <h1 class="font-weight-bold text-white m-0 text-left" id="text-harga">Rp. 0</h1>
                            <input type="hidden" class="form-control fw-bold" id="harga" name="harga" readonly value="">
                        </div>
                        
                          <div class="form-group col-lg-6">
                            <label for="">Select Payment Method :</label>
                            <select class="form-control mb-3" name="bank_account_id" id="bank_account_id" required>
                                <option value="" disabled selected>Select Payment</option>
                                @foreach($bankAccount as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }} </option>
                                @endforeach
                            </select>
                        </div>
                       
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="">Select a starting time :</label><br>
                            @foreach($paket->jam as $item)
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="jam_id" required
                                               id="jam_{{$item->id}}" value="{{ $item->id }}"> {{ $item->nama }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        
                      
                       
                    </div>
                    
                </div>
                
                <div class="col-6">
                    <h4 class="card-title mb-3 text-4 font-weight-bold">Booking Form</h4>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="nama">Full Name</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>

                        <div class="form-group col-lg-6 col-md-6">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group col-lg-6 col-md-6">
                            <label for="nomor_telp">Phone Number</label>
                            <input type="text" class="form-control" id="nomor_telp" name="nomor_telp" required>
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            <label>Nationality</label>
                            <select class="form-control mb-3 selectpicker" name="nationality" id="nationality" required data-live-search="true" data-size="10">
                                <option value="" disabled selected>Select Nationality</option>
                                @foreach(config('nationalities') as $item)
                                    <option value="{{ $item }}" {{ old('nationality')==$item?'selected':'' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                      
                        <div class="col-lg-12 mt-4">
                            <input type="hidden" name="nomor" value="{{ time() }}" required>
                            <input type="hidden" name="paket_id" value="{{ $paket->id }}" required>
                            <button type="submit" class="btn btn-lg btn-rounded btn-block btn-dark"> Book Now</button>
                        </div>
                    </div>
                </div>
                
                

            </div>
            </form>
        </div>
    </div>
</div>
@endisset

@push('frontend-css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/bootstrap-datepicker/css/bootstrap-datepicker.standalone.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-select/bootstrap-select.css') }}">

@endpush

@push('frontend-js')
    <script src="{{ asset('assets/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js') }}"></script>
    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            language : 'en',
            startDate : '+1d',
            todayHighlight: true,
            orientation : 'bottom'
        });

        // Set date dari parameter jika ada
        $(document).ready(function(){
            @if(isset($date) && $date)
                var dateValue = '{{ $date }}';
                if(dateValue && dateValue.length > 0) {
                    setTimeout(function(){
                        $('#tgl_kedatangan').datepicker('setDate', dateValue);
                        $('#tgl_kedatangan').val(dateValue);
                    }, 100);
                }
            @endif
        });

        $(".selectpicker").selectpicker();

        function showPrice(){
            let harga = $("#paket_harga_id").find(':selected').attr('data-harga');
            $("#text-harga").text(formatNumber(harga));
            $("#harga").val(formatNumber(harga));
        }

        function updateTotalPerson(){
            var adult = parseInt($("#adult").val()) || 0;
            var total = adult;
            $("#total_person_display").text(total);
            $("#total_person").val(total);
            validatePersonCount();
        }

        function updatePersonLimits(){
            var selectedOption = $("#paket_harga_id").find(':selected');
            var minPerson = selectedOption.attr('data-min-person') || 1;
            var maxPerson = selectedOption.attr('data-max-person');
            
            // Store limits in data attributes for validation
            $("#adult").data('min-person', minPerson);
            $("#adult").data('max-person', maxPerson);
            
            validatePersonCount();
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

        // Initialize on page load
        $(document).ready(function(){
            updateTotalPerson();
            updatePersonLimits();
            
            // Jika ada parameter dari home, langsung update limits
            @if(isset($adults))
                updatePersonLimits();
            @endif
        });
    </script>
@endpush
