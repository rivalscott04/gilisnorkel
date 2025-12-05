@extends('layouts.app')

@section('title','Booking')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Transaksi /</span> Booking
        </h4>
    <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ request()->routeIs('admin.booking.create') ? 'Tambah' : 'Ubah' }} Data</h5>
                        <small class="text-muted float-end"><a href="{{ route('admin.booking.index') }}" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a></small>
                    </div>
                    @php  $urlAction = request()->routeIs('admin.booking.create') ? route('admin.booking.store') : route('admin.booking.update',$booking) @endphp
                    @php  $methodForm = request()->routeIs('admin.booking.create') ? 'POST' : 'PUT' @endphp
                    <form id="needs-validation" novalidate method="post"
                          enctype="multipart/form-data" data-parsley-validate
                          action="{{ $urlAction }}"
                          onsubmit="return validateBeforeSubmit()">
                        @csrf
                        @method($methodForm)
                    <div class="card-body">
                        @include('includes.error_alert')
                        <div class="row">
                            <div class="mb-3 col-lg-6 col-md-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control @error('nama') parsley-error @enderror" id="nama" name="nama"
                                       data-parsley-required  value="{{ old('nama',$booking->nama??'') }}" />
                            </div>
                            <div class="mb-3 col-lg-6 col-md-6">
                                <label class="form-label">Nationality</label>
                                <select name="nationality" id="nationality" class="selectpicker w-100 @error('nationality') parsley-error @enderror"
                                        data-live-search="true" data-style="btn-default" data-parsley-required data-size="5">
                                    <option value="">-</option>
                                    @foreach(config('nationalities') as $item)
                                        <option value="{{ $item }}" {{ old('nationality',$booking->nationality??'')==$item ? 'selected' :'' }}>{{ $item }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3 col-lg-3 col-md-4">
                                <label class="form-label">Nomor Telp</label>
                                <input type="text" class="form-control @error('nomor_telp') parsley-error @enderror" id="nomor_telp" name="nomor_telp"
                                       data-parsley-required
                                       value="{{ old('nomor_telp',$booking->nomor_telp??'') }}" />
                            </div>
                            <div class="mb-3 col-lg-3 col-md-4">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') parsley-error @enderror" id="email" name="email"
                                       data-parsley-required  value="{{ old('email',$booking->email??'') }}" />
                            </div>
                            <div class="mb-3 col-lg-3 col-md-4">
                                <label class="form-label">Starting Time</label>
                                <select name="jam_id" id="jam_id" class="selectpicker w-100 @error('jam_id') parsley-error @enderror"
                                        data-live-search="true" data-style="btn-default" data-parsley-required data-size="3">
                                    <option value="">-</option>
                                    @foreach($jam as $item)
                                        <option value="{{ $item->id }}" {{ old('jam_id',$booking->jam_id??'')==$item->id ? 'selected' :'' }}>{{ $item->nama }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3 col-lg-3 col-md-4">
                                <label class="form-label">Tgl Kedatangan</label>
                                <input type="text" class="form-control datepicker @error('tgl_kedatangan') parsley-error @enderror" id="tgl_kedatangan" name="tgl_kedatangan"
                                       data-parsley-required  value="{{ old('tgl_kedatangan',$booking->tgl_kedatangan??'') }}" readonly/>
                            </div>
                            <div class="mb-3 col-lg-4 col-md-3">
                                <label class="form-label">Paket</label>
                                <select name="paket_id" id="paket_id" class="selectpicker w-100 @error('paket_id') parsley-error @enderror"
                                        data-live-search="true" data-style="btn-default" data-parsley-required data-size="3">
                                    <option value="">-</option>
                                    @foreach($paket as $item)
                                        <option value="{{ $item->id }}" {{ old('paket_id',$booking->paket_id??'')==$item->id ? 'selected' :'' }}
                                        data-harga="{{ json_encode($item->paketHarga) }}"
                                        data-harga-per-person="{{ $item->harga_per_person ?? 0 }}"
                                        data-max-person="{{ $item->max_person ?? 1 }}">{{ $item->nama }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3 col-lg-2 col-md-3">
                                <label class="form-label">Pax</label>
                                <select name="paket_harga_id" id="paket_harga_id" class="form-control form-select-md @error('paket_harga_id') parsley-error @enderror"
                                       onchange="showPrice(); updateAdult()">
                                    <option value="" data-person="0">Choose Pax</option>
                                    @isset($booking)
                                        @php
                                            $selectedPaket = $booking->paket;
                                            $maxPerson = $selectedPaket->max_person ?? 1;
                                            $selectedPerson = $booking->paketHarga->min_person ?? 1;
                                        @endphp
                                        @for($i = 1; $i <= $maxPerson; $i++)
                                            @php
                                                $paketHargaItem = $selectedPaket->paketHarga->where('min_person', $i)->first();
                                                $isSelected = ($selectedPerson == $i) ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $paketHargaItem->id ?? '' }}" data-person="{{ $i }}" {{ $isSelected }}>
                                                {{ $i }} {{ $i == 1 ? 'Participant' : 'Participants' }}
                                            </option>
                                        @endfor
                                    @endisset
                                </select>
                                <input type="hidden" name="adult" id="adult" value="{{ old('adult', $booking->adult ?? ($booking->paketHarga->min_person ?? 1)) }}">
                            </div>
                            <div class="mb-3 col-lg-2 col-md-3">
                                <label class="form-label">Harga Paket</label>
                                <input type="text" class="form-control formatRupiah @error('harga') parsley-error @enderror" id="harga" name="harga"
                                       data-parsley-required  value="{{ old('harga',number_format($booking->harga??0)) }}"  readonly/>
                            </div>
                            <div class="mb-3 col-lg-4 col-md-3">
                                <label class="form-label">Payment Via</label>
                                <select name="bank_account_id" id="bank_account_id" class="selectpicker w-100 @error('bank_account_id') parsley-error @enderror"
                                        data-live-search="true" data-style="btn-default" data-parsley-required data-size="3" data-show-subtext="true">
                                    <option value="">-</option>
                                    @foreach($bankAccount as $item)
                                        <option value="{{ $item->id }}" {{ old('bank_account_id',$booking->bank_account_id??'')==$item->id ? 'selected' :'' }}
                                        data-subtext="{{ $item->nomor }}">{{ $item->nama }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <input type="hidden" data-parsley-required value="{{ old('nomor',$booking->nomor??time()) }}" name="nomor" id="nomor">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@include('includes.parsleyJs')
@include('includes.bootstrapSelectJs')
@include('includes.flatPickerJs')
@include('includes.cleaveJs')
@push('js')
    <script>
        $(document).ready(function() {
            // Simpan selected person count saat halaman load (untuk edit)
            var selectedPerson = parseInt($("#paket_harga_id option:selected").attr('data-person')) || 0;
            
            // Set adult field saat halaman load
            if(selectedPerson > 0) {
                $("#adult").val(selectedPerson);
            }
            
            // Trigger saat halaman load jika sudah ada paket_id yang selected
            if($("#paket_id").val()) {
                updatePaketHarga(selectedPerson);
                // Trigger showPrice setelah update untuk set harga yang benar
                setTimeout(function() {
                    showPrice();
                }, 100);
            }
        });

        $("#paket_id").on('changed.bs.select',function (e){
            updatePaketHarga();
            // Reset adult saat ganti paket
            $("#adult").val('0');
        });

        function updatePaketHarga(preserveSelectedPerson = null) {
            let selectedOption = $("#paket_id option:selected");
            let paketHarga = selectedOption.attr("data-harga");
            let hargaPerPerson = parseInt(selectedOption.attr("data-harga-per-person")) || 0;
            let maxPerson = parseInt(selectedOption.attr("data-max-person")) || 1;
            
            // Simpan harga_per_person dan max_person untuk perhitungan
            $("#paket_id").data('harga-per-person', hargaPerPerson);
            $("#paket_id").data('max-person', maxPerson);

            // Update dropdown paket_harga_id - generate dari 1 sampai max_person
            $("#paket_harga_id").empty().append("<option value='' data-person='0'>Choose Pax</option>");
            
            if(paketHarga) {
                let hargaArr = JSON.parse(paketHarga);
                // Generate opsi dari 1 sampai max_person
                for(let i = 1; i <= maxPerson; i++) {
                    // Cari paket_harga yang sesuai dengan jumlah person ini
                    let matchingHarga = hargaArr.find(function(item) {
                        return (item.min_person == i && item.max_person == i);
                    });
                    
                    let optionValue = matchingHarga ? matchingHarga.id : '';
                    let isSelected = (preserveSelectedPerson && preserveSelectedPerson == i) ? 'selected' : '';
                    let label = i + (i == 1 ? ' Participant' : ' Participants');
                    
                    $("#paket_harga_id").append("<option value='"+optionValue+"' data-person='"+i+"' "+isSelected+">"+label+"</option>");
                }
            }
            
            // Update adult jika ada preserveSelectedPerson
            if(preserveSelectedPerson && preserveSelectedPerson > 0) {
                $("#adult").val(preserveSelectedPerson);
            }
            
            // Reset harga hanya jika tidak ada preserveSelectedPerson
            if(!preserveSelectedPerson) {
                $("#harga").val('0');
                $("#adult").val('0');
            }
        }

        function updateAdult() {
            let selectedPax = $("#paket_harga_id option:selected");
            let personCount = parseInt(selectedPax.attr('data-person')) || 0;
            $("#adult").val(personCount);
            console.log('updateAdult: personCount =', personCount, 'adult value =', $("#adult").val());
        }

        function showPrice(){
            let selectedPax = $("#paket_harga_id option:selected");
            let personCount = parseInt(selectedPax.attr('data-person')) || 0;
            let hargaPerPerson = parseInt($("#paket_id").data('harga-per-person')) || 0;
            
            // Update adult field
            $("#adult").val(personCount);
            
            if(hargaPerPerson > 0 && personCount > 0) {
                // Hitung total harga = harga per person × jumlah person
                let totalHarga = hargaPerPerson * personCount;
                $("#harga").val(totalHarga.toLocaleString('en-US'));
            } else {
                $("#harga").val('0');
            }
        }
        
        function validateBeforeSubmit() {
            // Pastikan adult ter-update sebelum submit
            let selectedPax = $("#paket_harga_id option:selected");
            let personCount = parseInt(selectedPax.attr('data-person')) || 0;
            $("#adult").val(personCount);
            
            if(personCount <= 0) {
                alert('Silakan pilih jumlah peserta terlebih dahulu.');
                return false;
            }
            
            return true;
        }
    </script>
@endpush
