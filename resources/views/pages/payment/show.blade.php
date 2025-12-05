@extends('layouts.app')

@section('title','Payment')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Transaksi /</span> Payment
        </h4>
        <div class="row invoice-preview" >
            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4" id="print-area">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div
                            class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0"
                        >
                            <div class="mb-xl-0 mb-4">
                                <div class="d-flex svg-illustration mb-3 gap-2">
                                    <img src="{{ asset('assets/img/favicon/favicon.png') }}" alt="">

                                    <span class="app-brand-text h3 mb-0 fw-bold">GILI SNORKELING</span>
                                </div>
                                <p class="mb-1">Jl. Pantai Gili Trawangan</p>
                                <p class="mb-1">Lombok Utara, Nusa Tenggara Barat</p>
                                <p class="mb-0">(+62) 823 4046 2426 </p>
                            </div>
                            <div>
                                <h4>Invoice #{{ $payment->nomor }}</h4>
                                <div class="mb-2">
                                    <span class="me-1">Date:</span>
                                    <span class="fw-semibold">{{ $payment->tgl_bayar->format('d-m-Y') }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row p-sm-3 p-0">
                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                                <h6 class="pb-2">Invoice To:</h6>
                                <p class="mb-1"><b>{{ $payment->booking->nama }}</b></p>
                                <p class="mb-1">{{ $payment->booking->nomor_telp }}</p>
                                <p class="mb-1">{{ $payment->booking->email }}</p>
                            </div>
                            <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                                <h6 class="pb-2">Payment Status : </h6>
                                @if($payment->is_uang_muka)
                                    <span class="badge bg-label-danger">UANG MUKA</span>
                                @else
                                    <span class="badge bg-label-success">PAID</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table border-top m-0 w-100">
                            <thead>
                            <tr>
                                <th>Packages</th>
                                <th>Participants</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-nowrap"><b>{{ $payment->paket->nama }}</b> 
                        <br><span class="badge bg-label-danger"><b>Booking Date : </b>{{ $payment->booking->tgl_kedatangan->format('d-m-Y') }}</span>
                    </td>
                                <td class="text-nowrap">( {{ $payment->booking->paketHarga->keterangan }} )</td>
                                <td class="text-nowrap">Rp. {{ number_format($payment->total_bayar) }},00</td>

                            </tr>

                            <tr>
                                <td class="align-top px-4 py-5">
                                    
                                    <span>Thank you for your booking with us</span>
                                </td>
                                <td class="text-end px-4 py-5">
                                    <p class="mb-0"><b>Total Price (IDR) :</b></p>
                                </td>
                                <td class="px-4 py-5 text-nowrap">
                                    <p class="fw-semibold mb-2">Rp. {{ number_format($payment->total_bayar) }},00</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <!--div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <span class="fw-semibold">Guide :</span>
                                <span>{{ $payment->guide->nama??'' }}</span>
                            </div>
                            <div class="col-12">
                                <span class="fw-semibold">Phone :</span>
                                <span>{{ $payment->guide->no_telp??'' }}</span>
                            </div>
                        </div>
                    </div-->
                </div>
            </div>
            <!-- /Invoice -->



            <!-- Invoice Actions -->
            <div class="col-lg-3 col-12 invoice-actions">
                <div class="card mb-4">
                    <div class="card-body">
                        @include('includes.error_alert')
                        <a href="{{ route('admin.payment.index') }}" class="btn btn-danger d-grid w-100 mb-3">Kembali</a>
                        <a class="btn btn-success d-grid w-100 mb-3"
                            target="_blank"
                            href="{{ route('admin.payment.print',$payment) }}" >
                            Cetak
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

