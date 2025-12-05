@extends('layouts.app')

@section('title','Payment')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Transaksi /</span> Payment
        </h4>
        <form class="source-item py-sm-3" method="post" action="{{ route('admin.payment.store') }}">
            @csrf
        <div class="row invoice-add">
            <!-- Invoice Add-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-4">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6 mb-md-0 mb-4">
                                <div class="d-flex svg-illustration mb-4 gap-2">
                                    <img src="{{ asset('assets/img/favicon/favicon.png') }}" alt="">

                                    <span class="app-brand-text h3 mb-0 fw-bold">GILI SNORKELING</span>
                                </div>
                                <p class="mb-1">Jl. Pantai Gili Trawangan</p>
                                <p class="mb-1">Lombok Utara - Nusa Tenggara Barat</p></p>
                                <p class="mb-0">(+62) 82 340 462 426</p>
                            </div>
                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                                        <span class="h4 text-capitalize mb-0 text-nowrap">Invoice #</span>
                                    </dt>
                                    <dd class="col-sm-6 d-flex justify-content-md-end">
                                        <div class="w-px-150">
                                            <input
                                                type="text"
                                                class="form-control @error('nomor') parsley-error @enderror"
                                                readonly
                                                value="{{ old('nomor',time()) }}"
                                                id="nomor"
                                                name="nomor" data-parsley-required
                                            />
                                        </div>
                                    </dd>
                                    <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                                        <span class="fw-normal">Payment Date:</span>
                                    </dt>
                                    <dd class="col-sm-6 d-flex justify-content-md-end">
                                        <div class="w-px-150">
                                            <input type="text" class="form-control datepicker @error('tgl_bayar') parsley-error @enderror" placeholder="YYYY-MM-DD"
                                                   name="tgl_bayar" id="tgl_bayar" value="{{ old('tgl_bayar',now()->format('Y-m-d')) }}" />
                                        </div>
                                    </dd>
                                    

                                </dl>
                            </div>
                        </div>

                        <hr class="my-4 mx-n4" />

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-9 col-sm-8 col-12 mb-sm-0 mb-4">
                                <h6 class="pb-2">Nama Customer :</h6>
                                <select class="selectpicker form-control @error('booking_id') parsley-error @enderror" name="booking_id" id="booking_id"
                                        data-live-search="true" data-parsley-required data-show-subtext="true">
                                    <option selected disabled>Choose Booking</option>
                                    @foreach($booking as $item)
                                        <option value="{{ $item->id }}" {{ old('booking_id')==$item->id ?"selected" : '' }}
                                                data-subtext="{{ $item->nomor }}"
                                                data-paket="{{ ($item->paket->nama??'').' - [ '.($item->paketHarga->keterangan??"").' ]' }}"
                                                data-sisa-bayar="{{ $item->harga - $item->payments->sum('total_bayar') }}"
                                                data-harga = "{{ $item->harga }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-4">
                                <h6 class="pb-2">Tipe Pembayaran :</h6>
                                <select class="selectpicker mb-2 form-control @error('tipe_pembayaran') parsley-error @enderror" name="tipe_pembayaran" id="tipe_pembayaran" data-parsley-required required>
                                    <option selected disabled>Select Item</option>
                                    <option value="LUNAS" {{ old('tipe_pembayaran')=="LUNAS" ?"selected" : '' }}>Pelunasan</option>
{{--                                    <option value="DP" {{ old('tipe_pembayaran')=="DP" ?"selected" : '' }}>Uang Muka</option>--}}
                                </select>
                            </div>
                        </div>

                        <hr class="mx-n4" />
                        <div class="mb-3" data-repeater-list="group-a">
                            <div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item>
                                <div class="d-flex border rounded position-relative pe-0">
                                    <div class="row w-100 m-0 p-3">
                                        <div class="col-md-8 col-12 mb-md-0 mb-3 ps-md-0">
                                            <p class="mb-2 repeater-title">Nama Paket</p>
                                            <input class="form-control" placeholder="Item Information" id="nama_paket"
                                                      name="nama_paket" readonly value="{{ old('nama_paket') }}" />
                                        </div>

                                        <div class="col-md-4 col-12 pe-0">
                                            <p class="mb-2 repeater-title">Harga</p>
                                            <input type="text" class="form-control formatRupiah @error('harga') parsley-error @enderror"
                                                   id="harga" name="harga" data-parsley-required value="{{ old('harga') }}" readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <hr class="my-4 mx-n4">
                        <div class="row py-sm-3">
                            <div class="col-md-6 mb-md-0 mb-3">
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <div class="invoice-calculations">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="w-px-200 fw-bold">Pembayaran :</span>
                                        <input type="text" class="form-control formatRupiah @error('total_bayar') parsley-error @enderror"
                                               id="total_bayar" name="total_bayar" data-parsley-required value="{{ old('total_bayar') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-semibold">Guide : </label>
                                    <select class="selectpicker mb-2 form-control @error('guide_id') parsley-error @enderror" name="guide_id" id="guide_id"
                                            data-live-search="true" data-parsley-required data-show-subtext="true">
                                        <option selected disabled>Select Guide</option>
                                        @foreach($guides as $guide)
                                            <option value="{{ $guide->id }}" {{ old('guide_id',$payment->guide_id??'')==$guide->id ?"selected" : '' }}
                                                data-subtext="{{ $guide->no_telp }}">
                                                {{ $guide->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Invoice Add-->

            <!-- Invoice Actions -->
            <div class="col-lg-3 col-12 invoice-actions">
                <div class="card mb-4">
                    <div class="card-body">
                        @include('includes.error_alert')
                        <a href="{{ route('admin.payment.index') }}" class="btn btn-danger d-grid w-100 mb-3">Kembali</a>
                        <button type="submit" class="btn btn-primary d-grid w-100">Pay !</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection


@include('includes.flatPickerJs')
@include('includes.bootstrapSelectJs')
@include('includes.cleaveJs')
@push('js')
    <script>
        $("#booking_id").on('changed.bs.select',function (e){
            let harga = $('option:selected', e.currentTarget).attr("data-harga")
            let paket = $('option:selected', e.currentTarget).attr("data-paket")
            $("#harga").val(parseInt(harga).toLocaleString('en-US'));
            $("#total_bayar").val(parseInt(harga).toLocaleString('en-US'));
            $("#nama_paket").val(paket);

        })
    </script>
@endpush
