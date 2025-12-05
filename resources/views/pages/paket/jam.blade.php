@extends('layouts.app')

@section('title','Paket')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Master Data/Paket/</span>Jam
        </h4>
    <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Data Jam</h5>
                        <small class="text-muted float-end"><a href="{{ route('admin.paket.index') }}" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a></small>
                    </div>
                    @php  $urlAction = route('admin.paket.jam.store',$paket) @endphp
                    @php  $methodForm = 'POST' @endphp
                    <form id="needs-validation" novalidate method="post"
                          enctype="multipart/form-data" data-parsley-validate
                          action="{{ $urlAction }}">
                        @csrf
                        @method($methodForm)
                    <div class="card-body">
                        @include('includes.error_alert')
                        <div class="row">
                            <div class="mb-3 col-lg-10 col-md-9">
                                <label class="form-label">Jam</label>
                                <select name="jam_id" id="jam_id" class="form-control selectpicker @error("jam_id") parsley-error @enderror"
                                data-parsley-required data-size="5">
                                    <option value="">-- Pilih Jam --</option>
                                    @foreach($jam as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-lg-2 col-md-3">
                                <label class="form-label">&nbsp;</label><br>
                                <button type="submit" class="btn btn-primary w-100">Simpan Data</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered w-100">
                                        <thead>
                                        <tr>
                                            <th style="width: 5%">#</th>
                                            <th>Jam</th>
                                            <th style="width: 5%" class="text-center">Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($paket->paketJam as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->jam->nama}}</td>
                                                <td><a href='javascript:;' class='text-danger' onclick='fn_deleteData("{{ route('admin.paket.jam.destroy',$item->id)}}")' title='Hapus Data'><i class='bx bxs-trash bx-sm'></i></a></td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">No data avaliable..!</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('includes.parsleyJs')
@include('includes.cleaveJs')
@include('includes.bootstrapSelectJs')
@include('includes.swal_delete')
@push('js')
<script>
    let datatable = undefined;
</script>
@endpush
