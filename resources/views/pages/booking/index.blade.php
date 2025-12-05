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
                        <h5 class="mb-0">Data Booking</h5>
                        <small class="text-muted float-end"><a href="{{ route('admin.booking.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Tambah Data</a></small>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-nowrap">Tgl Datang</th>
                                    <th>Nama</th>
                                    <th>Telp</th>
                                    <th class="text-nowrap">Paket</th>
                                    <th class="text-nowrap">Harga</th>
                                    <th class="text-nowrap">Status</th>
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
            ajax: '{!! route('admin.booking.data') !!}',
            columns: [
                { data: 'id', name: 'id',render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data: 'tgl_kedatangan', name: 'tgl_kedatangan' },
                { data: 'nama', name: 'nama' },
                { data: 'nomor_telp', name: 'nomor_telp' },
                { data: 'paket.nama', name: 'paket.nama' },
                { data: 'harga', name: 'harga' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' }
            ],
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        })
    </script>
    @include('includes.swal_delete')
@endpush
