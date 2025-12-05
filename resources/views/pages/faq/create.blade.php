@extends('layouts.app')

@section('title','Faq')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Frontend/</span>Faq
        </h4>
    <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ request()->routeIs('admin.faq.create') ? 'Tambah' : 'Ubah' }} Data</h5>
                        <small class="text-muted float-end"><a href="{{ route('admin.faq.index') }}" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a></small>
                    </div>
                    @php  $urlAction = request()->routeIs('admin.faq.create') ? route('admin.faq.store') : route('admin.faq.update',$faq) @endphp
                    @php  $methodForm = request()->routeIs('admin.faq.create') ? 'POST' : 'PUT' @endphp
                    <form id="needs-validation" novalidate method="post"
                          enctype="multipart/form-data" data-parsley-validate
                          action="{{ $urlAction }}">
                        @csrf
                        @method($methodForm)
                    <div class="card-body">
                        @include('includes.error_alert')
                        <div class="row">
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">Question</label>
                                <input type="text" class="form-control @error('question') parsley-error @enderror" id="question" name="question"
                                       data-parsley-required  value="{{ old('question',$faq->question??'') }}" />
                            </div>

                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">Answer</label>
                                <textarea name="answer" id="answer" class="d-none form-control quillEditor @error('answer') parsley-error @enderror"
                                    data-parsley-required>{!! old('answer',$faq->answer??"") !!}</textarea>
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
@include('includes.quillEditorJs')

