@extends('layouts.app')

@section('title','Home Dashboard')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">Welcome Admin !!!</h4>
        <div class="row">

            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="avatar mx-auto mb-2">
                    <span class="avatar-initial rounded-circle bg-label-primary"
                    ><i class="bx bx-purchase-tag fs-4"></i
                        ></span>
                        </div>
                        <span class="d-block text-nowrap">Unpaid Bookings</span>
                        <h2 class="mb-0">{{ $unpaid_booking_count }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="avatar mx-auto mb-2">
                    <span class="avatar-initial rounded-circle bg-label-warning"
                    ><i class="bx bx-cart fs-4"></i
                        ></span>
                        </div>
                        <span class="d-block text-nowrap">Unpaid Payment</span>
                        <h2 class="mb-0">IDR {{ number_format($unpaid_booking_sum/1000).'K' }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="avatar mx-auto mb-2">
                    <span class="avatar-initial rounded-circle bg-label-success"
                    ><i class="bx bx-check fs-4"></i
                        ></span>
                        </div>
                        <span class="d-block text-nowrap">Earnings This Month</span>
                        <h2 class="mb-0">IDR {{ number_format($earning_thismonth/1000).'K' }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="avatar mx-auto mb-2">
                    <span class="avatar-initial rounded-circle bg-label-warning"
                    ><i class="bx bx-user fs-4"></i
                        ></span>
                        </div>
                        <span class="d-block text-nowrap">Guides</span>
                        <h2 class="mb-0">{{ $guide_count }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
     <div class="container-xxl flex-grow-1 container-p-y">
        
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Data Payment</h5>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-nowrap">Tgl Bayar</th>
                                    <th>Nama</th>
                                    <th>Paket</th>
                                   
                                    
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Harga</th>
                                    
                                    
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables-bs5/datatables.bootstrap5.css') }}">
@endpush

@push('js')
    <script src="{{ asset('assets/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script>
        let datatable = $(".datatable").DataTable({
            language:{
                "info": "Data _START_ sampai _END_ dari _TOTAL_ data.",
            },
            processing: true,
            serverSide: true,
            responsive:true,
            ajax: '{!! route('admin.payment.data') !!}',
            columns: [
                { data: 'id', name: 'id',render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data: 'tgl_bayar', name: 'tgl_bayar' },
                { data: 'booking.nama', name: 'booking.nama' },
                { data: 'paket.nama', name: 'paket.nama' },
              
                { data: 'status', name: 'status' },
                { data: 'total_bayar', name: 'total_bayar' },
                { data: 'action', name: 'action' }
            ],
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        })
    </script>
    @include('includes.swal_delete')
@endpush

