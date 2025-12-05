@extends('layouts.app')

@section('title','Konfigurasi')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Master Data/</span>Konfigurasi
        </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Konfigurasi Aplikasi</h5>
{{--                        <small class="text-muted float-end"><a href="{{ route('konfigurasi.index') }}" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a></small>--}}
                    </div>
                    @php  $urlAction = route('admin.konfigurasi.store') @endphp
                    @php  $methodForm = 'POST' @endphp
                    <form id="needs-validation" novalidate method="post"
                          enctype="multipart/form-data" data-parsley-validate
                          action="{{ $urlAction }}">
                        @csrf
                        @method($methodForm)
                        <div class="card-body">
                            @include('includes.error_alert')
                            <div class="row">
                                <div class="mb-3 col-lg-4 col-md-4">
                                    <label class="form-label">Email Notifikasi</label>
                                    <input type="email" class="form-control @error('email_notifikasi') parsley-error @enderror" id="email_notifikasi" name="email_notifikasi"
                                           data-parsley-required data-parsley-type="email" value="{{ old('email_notifikasi',$konfigurasi->email_notifikasi??'') }}" />
                                </div>
                                <div class="mb-3 col-lg-4 col-md-4">
                                    <label class="form-label">Nomor Telp/WA</label>
                                    <input type="number" class="form-control @error('nomor_telp') parsley-error @enderror" id="nomor_telp" name="nomor_telp"
                                           data-parsley-required data-parsley-type="number"
                                           value="{{ old('nomor_telp',$konfigurasi->nomor_telp??'') }}" />
                                </div>
                                <div class="mb-3 col-lg-4 col-md-4">
                                    <label class="form-label">Slogan</label>
                                    <input type="text" class="form-control @error('slogan') parsley-error @enderror" id="slogan" name="slogan"
                                           data-parsley-required
                                           value="{{ old('slogan',$konfigurasi->slogan??'') }}" />
                                </div>

                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="d-none form-control quillEditor @error('deskripsi') parsley-error @enderror"
                                              data-parsley-required>{!! old('deskripsi',$konfigurasi->deskripsi??"") !!}</textarea>
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
@include('includes.quillEditorJs')

