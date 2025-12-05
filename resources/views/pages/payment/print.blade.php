@extends('layouts.empty')

@section('title','Payment')
@section('content')
    <div class="invoice-print p-5">
        <div class="d-flex justify-content-between flex-row">
            <div class="mb-4">
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

        <hr>

        <div class="row d-flex justify-content-between mb-4">
            <div class="col-sm-6 w-50">
                <h6>Invoice To:</h6>
                <p class="mb-1"><b>{{ $payment->booking->nama }}</b></p>
                <p class="mb-1">{{ $payment->booking->nomor_telp }}</p>
                <p class="mb-1">{{ $payment->booking->email }}</p>
            </div>
            <div class="col-sm-6 w-50">
                <h6 class="pb-2">Payment Status : </h6>
                @if($payment->is_uang_muka)
                    <span class="badge bg-label-danger">UANG MUKA</span>
                @else
                    <span class="badge bg-label-success">PAID</span>
                @endif

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
                    <td class="text-nowrap"><b>{{ $payment->paket->nama }}</b> <br><span class="badge bg-label-danger"><b>Booking Date : </b>{{ $payment->booking->tgl_kedatangan->format('d-m-Y') }}</span></td>
                    <td class="text-nowrap">( {{ $payment->booking->paketHarga->keterangan }} ) </td>
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
<br>
       
        <hr>
        <br>
        <div class="row">
            <div class="col-12">
                <span class="fw-semibold">Cancellation Policy :</span>
                
            </div>
            <div class="col-12">
                <ul>
                    <li>                
                                  <span>If you cancel up to 7 days before the Experience start time, or within 24 hours of booking provided the booking was made more than 48 hours before the Experience start time, you will get a full refund.</span>
                    </li> 
                    <li>                
                                  <span>Cancellation made by customers on the same day they make booking for any reason is non-refundable.</span>
                    </li> 
                    <li>                
                                  <span>Customers who don’t show up on the day of tour departure is not-refundable.</span>
                    </li>              
                </ul>
                                </div>
        </div>

        <div class="row">
            <div class="col-12">
                <span class="fw-semibold">Payment Policy :</span>
                
            </div>
            <div class="col-12">
                              
                                  <span>Customers must make appropriate payments according to the nominal price mentioned on the tour package details until the most recent digit.</span>
                                </div>

                                
        </div>
        <br>
        <div class="row">
            <div class="col-12">
            All our tours are subject to weather conditions and can be cancelled without prior notice. In case of cancellation from us, the tour will be rescheduled or entirely refunded if a rescheduling option is not available.

                
            </div>
           
                                
        </div>
<br><br>
        <div class="col-12">
        <strong class="text-uppercase text-1 mr-3 text-dark">follow our instagram</strong>
        
            <span >: @gili_snorkelingtour</i></a></span>
          
       
    </div>

    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/app-invoice-print.css') }}">
@endpush
@push('js')
    <script>
        (function () {
            window.print();
        })();
    </script>
@endpush
