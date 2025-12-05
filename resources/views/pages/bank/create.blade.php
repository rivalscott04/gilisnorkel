@extends('layouts.app')

@section('title','Bank Account')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Master Data/</span>Bank Account
        </h4>
    <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ request()->routeIs('admin.bank.create') ? 'Tambah' : 'Ubah' }} Data</h5>
                        <small class="text-muted float-end"><a href="{{ route('admin.bank.index') }}" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a></small>
                    </div>
                    @php  $urlAction = request()->routeIs('admin.bank.create') ? route('admin.bank.store') : route('admin.bank.update',$bank) @endphp
                    @php  $methodForm = request()->routeIs('admin.bank.create') ? 'POST' : 'PUT' @endphp
                    <form id="needs-validation" novalidate method="post"
                          enctype="multipart/form-data" data-parsley-validate
                          action="{{ $urlAction }}">
                        @csrf
                        @method($methodForm)
                    <div class="card-body">
                        @include('includes.error_alert')
                        <div class="row">
                            <div class="mb-3 col-lg-3 col-md-4 col-sm-12">
                                <label class="form-label">Nama Bank</label>
                                <input type="text" class="form-control @error('nama') parsley-error @enderror" id="nama" name="nama"
                                       data-parsley-required  value="{{ old('nama',$bank->nama??'') }}" />
                            </div>

                            <div class="mb-3 col-lg-3 col-md-4 col-sm-12">
                                <label class="form-label">Nomor Account</label>
                                <input type="text" class="form-control @error('nomor') parsley-error @enderror" id="nomor" name="nomor"
                                       data-parsley-required  value="{{ old('nomor',$bank->nomor??'') }}" />
                            </div>

                            <div class="mb-3 col-lg-4 col-md-8 col-sm-12">
                                <label class="form-label">Nama Account</label>
                                <input type="text" class="form-control @error('nama_account') parsley-error @enderror" id="nama_account" name="nama_account"
                                       data-parsley-required  value="{{ old('nama_account',$bank->nama_account??'') }}" />
                            </div>
                            <div class="mb-3 col-lg-2 col-md-4 col-sm-12">
                                <label class="form-label">Is Active?</label>
                                <select name="is_active" id="is_active" class="form-control @error('is_active') parsley-error @enderror"
                                    data-parsley-required >
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1" {{ old("is_active",$bank->is_active??'')==1 ? 'selected' : '' }}>Ya</option>
                                    <option value="0" {{ old("is_active",$bank->is_active??'')==0 ? 'selected' : '' }}>Tidak</option>
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

