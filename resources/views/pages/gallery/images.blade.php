@extends('layouts.app')

@section('title','Gallery')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Frontend/Gallery/</span> Images
        </h4>
    <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Gallery Image</h5>
                        <small class="text-muted float-end"><a href="{{ route('admin.gallery.index') }}" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a></small>
                    </div>
                    @php  $urlAction = route('admin.gallery.image.store',$gallery) @endphp
                    @php  $methodForm = 'POST' @endphp
                    <form id="needs-validation" novalidate method="post"
                          enctype="multipart/form-data" data-parsley-validate
                          action="{{ $urlAction }}">
                        @csrf
                        @method($methodForm)
                    <div class="card-body">
                        @include('includes.error_alert')
                        <div class="row">
                            <div class="mb-3 col-lg-12 col-md-4">
                                <label class="form-label">Images</label>
                                <select name="image_id" id="image_id" class="selectpicker w-100 @error('images') parsley-error @enderror"
                                        data-live-search="true" data-style="btn-default" data-parsley-required data-size="5">
                                    <option value="">-</option>
                                    @foreach($images as $item)
                                        <option value="{{ $item->id }}" {{ old('image_id','')==$item->id ? 'selected' : ''  }}
                                        data-content="<div class='d-flex align-items-center'><div class='flex-shrink-0'><img src='{!! $item?->getFirstMedia()?->getUrl('option-select') !!}' width='100px'></div><span class='flex-grow-1 ms-3'>{!! $item->keterangan !!}</span></div>"
                                        >{{ $item->keterangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered w-100">
                                        <thead>
                                        <tr>
                                            <th style="width: 5%">#</th>
                                            <th>Keterangan</th>
                                            <th style="width: 15%">Image</th>
                                            <th style="width: 5%" class="text-center">Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($gallery->images as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->keterangan}}</td>
                                                <td><img src="{{ $item?->getFirstMedia()?->getUrl('option-select') }}" alt=""></td>
                                                <td><a href='javascript:;' class='text-danger'
                                                       onclick='fn_deleteData("{{ route('admin.gallery.image.destroy',$item->pivot->id)}}")' title='Hapus Data'><i class='bx bxs-trash bx-sm'></i></a></td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">No data avaliable..!</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
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
@include('includes.bootstrapSelectJs')
@include('includes.swal_delete')
@push('js')
<script>
    let datatable = undefined;
</script>
@endpush
