@extends('layouts.app')

@section('title','Paket')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Master Data/</span>Paket
        </h4>
    <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ request()->routeIs('admin.paket.create') ? 'Tambah' : 'Ubah' }} Data</h5>
                        <small class="text-muted float-end"><a href="{{ route('admin.paket.index') }}" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a></small>
                    </div>
                    @php  $urlAction = request()->routeIs('admin.paket.create') ? route('admin.paket.store') : route('admin.paket.update',$paket) @endphp
                    @php  $methodForm = request()->routeIs('admin.paket.create') ? 'POST' : 'PUT' @endphp
                    <form id="needs-validation" novalidate method="post"
                          enctype="multipart/form-data" data-parsley-validate
                          action="{{ $urlAction }}">
                        @csrf
                        @method($methodForm)
                    <div class="card-body">
                        @include('includes.error_alert')
                        <div class="row">
                            <div class="mb-3 col-lg-8 col-md-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control @error('nama') parsley-error @enderror" id="nama" name="nama"
                                       data-parsley-required  value="{{ old('nama',$paket->nama??'') }}" />
                            </div>
                            <div class="mb-3 col-lg-2 col-md-3">
                                <label class="form-label">Hari</label>
                                <input type="number" class="form-control @error('hari') parsley-error @enderror" id="hari" name="hari"
                                       data-parsley-required data-parsley-type="number"
                                       value="{{ old('hari',$paket->hari??'') }}" />
                            </div>
                            <div class="mb-3 col-lg-2 col-md-3">
                                <label class="form-label">Max Person</label>
                                <input type="number" class="form-control @error('max_person') parsley-error @enderror" id="max_person" name="max_person"
                                       data-parsley-required data-parsley-type="number" min="1"
                                       value="{{ old('max_person',$paket->max_person??8) }}" />
                                <small class="text-muted">Kapasitas maksimal perahu/kapal</small>
                            </div>
                            <div class="mb-3 col-lg-3 col-md-3">
                                <label class="form-label">Harga Per Orang</label>
                                <input type="text" class="form-control formatRupiah @error('harga_per_person') parsley-error @enderror" id="harga_per_person" name="harga_per_person"
                                       data-parsley-required value="{{ old('harga_per_person',$paket->harga_per_person??'') }}" />
                                <small class="text-muted">Harga per 1 person (akan auto-generate untuk semua jumlah)</small>
                            </div>
                            <div class="mb-3 col-lg-2 col-md-3 col-sm-12">
                                <label class="form-label">Is Active?</label>
                                <select name="is_active" id="is_active" class="form-control @error('is_active') parsley-error @enderror"
                                        data-parsley-required >
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1" {{ old("is_active",$paket->is_active??'')==1 ? 'selected' : '' }}>Ya</option>
                                    <option value="0" {{ old("is_active",$paket->is_active??'')==0 ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="d-none form-control quillEditor @error('deskripsi') parsley-error @enderror"
                                    data-parsley-required>{!! old('deskripsi',$paket->deskripsi??"") !!}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-12 col-md-4">
                                <label class="form-label">Images</label>
                                <select name="images[]" id="images" class="selectpicker w-100 @error('images') parsley-error @enderror" multiple
                                        data-live-search="true" data-style="btn-default" data-parsley-required data-size="5">
                                    <option value="">-</option>
                                    @foreach($images as $item)
                                        <option value="{{ $item->id }}" {{ (isset($paket) && $paket->images->where('id',$item->id)->count()>0 ? 'selected' : '')  }}
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
@include('includes.quillEditorJs')

