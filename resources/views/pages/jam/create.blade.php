@extends('layouts.app')

@section('title','Jam Mulai')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Master Data/</span>Jam Mulai
        </h4>
    <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ request()->routeIs('admin.jam.create') ? 'Tambah' : 'Ubah' }} Data</h5>
                        <small class="text-muted float-end"><a href="{{ route('admin.jam.index') }}" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a></small>
                    </div>
                    @php  $urlAction = request()->routeIs('admin.jam.create') ? route('admin.jam.store') : route('admin.jam.update',$jam) @endphp
                    @php  $methodForm = request()->routeIs('admin.jam.create') ? 'POST' : 'PUT' @endphp
                    <form id="needs-validation" novalidate method="post"
                          enctype="multipart/form-data" data-parsley-validate
                          action="{{ $urlAction }}">
                        @csrf
                        @method($methodForm)
                    <div class="card-body">
                        @include('includes.error_alert')
                        <div class="row">
                            <div class="mb-3 col-lg-10 col-md-9 col-sm-12">
                                <label class="form-label">Jam</label>
                                <input type="text" class="form-control @error('nama') parsley-error @enderror" id="nama" name="nama"
                                       data-parsley-required  value="{{ old('nama',$jam->nama??'') }}" />
                            </div>

                            <div class="mb-3 col-lg-2 col-md-3 col-sm-12">
                                <label class="form-label">Is Active?</label>
                                <select name="is_active" id="is_active" class="form-control @error('is_active') parsley-error @enderror"
                                    data-parsley-required >
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1" {{ old("is_active",$jam->is_active??'')==1 ? 'selected' : '' }}>Ya</option>
                                    <option value="0" {{ old("is_active",$jam->is_active??'')==0 ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('includes.parsleyJs')
@include('includes.cleaveJs')

