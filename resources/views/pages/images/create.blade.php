@extends('layouts.app')

@section('title','Images')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Master Data/</span>Images
        </h4>
    <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ request()->routeIs('images.create') ? 'Tambah' : 'Ubah' }} Data</h5>
                        <small class="text-muted float-end"><a href="{{ route('admin.images.index') }}" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a></small>
                    </div>
                    @php  $urlAction = request()->routeIs('admin.images.create') ? route('admin.images.store') : route('admin.images.update',$image) @endphp
                    @php  $methodForm = request()->routeIs('admin.images.create') ? 'POST' : 'PUT' @endphp
                    <form id="needs-validation" novalidate method="post"
                          enctype="multipart/form-data" data-parsley-validate
                          action="{{ $urlAction }}">
                        @csrf
                        @method($methodForm)
                    <div class="card-body">
                        @include('includes.error_alert')
                        <div class="row">
                            <div class="form-group mb-3 col-lg-8 col-md-6">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control @error('keterangan') parsley-error @enderror" id="keterangan" name="keterangan"
                                       data-parsley-required  value="{{ old('keterangan',$image->keterangan??'') }}" />
                            </div>
                            <div class="form-group mb-3 col-lg-4 col-md-3">
                                <label class="form-label">File Image</label>
                                <input type="file" class="form-control @error('file_image') parsley-error @enderror" id="file_image" name="file_image"
                                       data-parsley-required accept=".jpg,.png,.jpeg" />
                            </div>
                            <div class="form-group mb-3 col-lg-12">
                                <label class="form-label">Current Image</label><br>
                                <img src="{{ isset($image) ? $image->getFirstMedia()->getUrl('frontend') : asset('assets/img/logo-full.png') }}" alt="" class="img-fluid">
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

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-select/bootstrap-select.css') }}">
@endpush

@push('js')
    @include('includes.parsleyJs')
    @include('includes.cleaveJs')
    @include('includes.bootstrapSelectJs')
@endpush



