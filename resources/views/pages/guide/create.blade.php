@extends('layouts.app')

@section('title','Guide')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Master Data/</span>Guide
        </h4>
    <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ request()->routeIs('admin.guide.create') ? 'Tambah' : 'Ubah' }} Data</h5>
                        <small class="text-muted float-end"><a href="{{ route('admin.guide.index') }}" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a></small>
                    </div>
                    @php  $urlAction = request()->routeIs('admin.guide.create') ? route('admin.guide.store') : route('admin.guide.update',$guide) @endphp
                    @php  $methodForm = request()->routeIs('admin.guide.create') ? 'POST' : 'PUT' @endphp
                    <form id="needs-validation" novalidate method="post"
                          enctype="multipart/form-data" data-parsley-validate
                          action="{{ $urlAction }}">
                        @csrf
                        @method($methodForm)
                    <div class="card-body">
                        @include('includes.error_alert')
                        <div class="row">
                            <div class="mb-3 col-lg-8 col-md-8 col-sm-12">
                                <label class="form-label">Nama Guide</label>
                                <input type="text" class="form-control @error('nama') parsley-error @enderror" id="nama" name="nama"
                                       data-parsley-required  value="{{ old('nama',$guide->nama??'') }}" />
                            </div>

                            <div class="mb-3 col-lg-4 col-md-4 col-sm-12">
                                <label class="form-label">Nomor Telp</label>
                                <input type="text" class="form-control @error('no_telp') parsley-error @enderror" id="no_telp" name="no_telp"
                                       data-parsley-required  value="{{ old('no_telp',$guide->no_telp??'') }}" />
                            </div>
                            <div class="mb-3 col-lg-12 col-md-4">
                                <label class="form-label">Images</label>
                                <select name="image_id" id="image_id" class="selectpicker w-100 @error('image_id') parsley-error @enderror"
                                        data-live-search="true" data-style="btn-default" data-parsley-required data-size="5">
                                    <option value="">-</option>
                                    @foreach($images as $item)
                                        <option value="{{ $item->id }}" {{ old('image_id',$guide->image_id??"")==$item->id ? 'selected' : ''  }}
                                        data-content="<div class='d-flex align-items-center'><div class='flex-shrink-0'><img src='{!! $item?->getFirstMedia()?->getUrl('option-select') !!}' width='100px'></div><span class='flex-grow-1 ms-3'>{!! $item->keterangan !!}</span></div>"
                                        >{{ $item->keterangan }}</option>
                                    @endforeach
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
@include('includes.bootstrapSelectJs')
