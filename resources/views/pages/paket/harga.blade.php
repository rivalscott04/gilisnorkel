@extends('layouts.app')

@section('title','Paket')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Master Data/Paket/</span>Harga
        </h4>
    <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Kelola Harga - {{ $paket->nama }}</h5>
                        <div>
                            <a href="{{ route('admin.paket.harga.regenerate',$paket->id) }}" class="btn btn-warning btn-sm" onclick="return confirm('Yakin ingin regenerate semua harga? Harga yang sudah diubah manual akan direset!')">
                                <i class="bx bx-refresh"></i> Regenerate Harga
                            </a>
                            <a href="{{ route('admin.paket.index') }}" class="btn btn-danger btn-sm"><i class="bx bx-arrow-back"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('includes.error_alert')
                        
                        <!-- Info Paket -->
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Harga Per Orang</h6>
                                        <h4 class="text-primary">Rp {{ number_format($paket->harga_per_person ?? 0) }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Max Person</h6>
                                        <h4 class="text-info">{{ $paket->max_person ?? 0 }} Orang</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Total Harga Tersedia</h6>
                                        <h4 class="text-success">{{ $paket->paketHarga->count() }} Entry</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <i class="bx bx-info-circle"></i> 
                            <strong>Info:</strong> Harga otomatis di-generate dari Harga Per Orang × Jumlah Person. 
                            Anda dapat mengubah harga secara manual jika diperlukan. 
                            Klik tombol "Regenerate Harga" untuk reset semua harga sesuai Harga Per Orang.
                        </div>

                        <!-- Tabel Harga -->
                        <div class="table-responsive">
                            <table class="table table-bordered w-100">
                                <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th>Keterangan</th>
                                    <th style="width: 15%">Harga</th>
                                    <th style="width: 10%">Min Person</th>
                                    <th style="width: 10%">Max Person</th>
                                    <th style="width: 15%" class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($paket->paketHarga->sortBy('min_person') as $item)
                                    <tr data-id="{{ $item->id }}">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->keterangan}}</td>
                                        <td>
                                            <span class="harga-display">{{number_format($item->harga)}}</span>
                                            <input type="text" class="form-control formatRupiah harga-input d-none" 
                                                   value="{{ $item->harga }}" 
                                                   data-id="{{ $item->id }}"
                                                   data-original="{{ $item->harga }}">
                                        </td>
                                        <td>{{$item->min_person ?? 1}}</td>
                                        <td>{{$item->max_person ?? ($item->min_person ?? 1)}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-success btn-edit-harga" data-id="{{ $item->id }}">
                                                <i class="bx bxs-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-primary btn-save-harga d-none" data-id="{{ $item->id }}">
                                                <i class="bx bx-save"></i> Simpan
                                            </button>
                                            <button class="btn btn-sm btn-secondary btn-cancel-edit d-none" data-id="{{ $item->id }}">
                                                <i class="bx bx-x"></i> Batal
                                            </button>
                                            <a href='javascript:;' class='btn btn-sm btn-danger' onclick='fn_deleteData("{{ route('admin.paket.harga.destroy',$item->id)}}")' title='Hapus Data'>
                                                <i class='bx bxs-trash'></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada data harga. Harga akan otomatis di-generate saat paket dibuat.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('includes.parsleyJs')
@include('includes.cleaveJs')
@include('includes.swal_delete')
@push('js')
<script>
    $(document).ready(function() {
        // Edit Harga
        $('.btn-edit-harga').on('click', function() {
            var id = $(this).data('id');
            var row = $('tr[data-id="' + id + '"]');
            
            row.find('.harga-display').addClass('d-none');
            row.find('.harga-input').removeClass('d-none');
            row.find('.btn-edit-harga').addClass('d-none');
            row.find('.btn-save-harga').removeClass('d-none');
            row.find('.btn-cancel-edit').removeClass('d-none');
        });

        // Cancel Edit
        $('.btn-cancel-edit').on('click', function() {
            var id = $(this).data('id');
            var row = $('tr[data-id="' + id + '"]');
            var input = row.find('.harga-input');
            
            input.val(input.data('original'));
            row.find('.harga-display').removeClass('d-none');
            row.find('.harga-input').addClass('d-none');
            row.find('.btn-edit-harga').removeClass('d-none');
            row.find('.btn-save-harga').addClass('d-none');
            row.find('.btn-cancel-edit').addClass('d-none');
        });

        // Save Harga
        $('.btn-save-harga').on('click', function() {
            var id = $(this).data('id');
            var row = $('tr[data-id="' + id + '"]');
            var input = row.find('.harga-input');
            var newHarga = input.val().replace(/,/g, '');
            
            if (!newHarga || newHarga <= 0) {
                alert('Harga tidak valid!');
                return;
            }

            // Disable button
            $(this).prop('disabled', true).html('<i class="bx bx-loader bx-spin"></i> Menyimpan...');

            $.ajax({
                url: '{{ route("admin.paket.harga.update", ":id") }}'.replace(':id', id),
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    harga: newHarga
                },
                success: function(response) {
                    row.find('.harga-display').text(formatNumberLocal(parseInt(newHarga)));
                    row.find('.harga-display').removeClass('d-none');
                    row.find('.harga-input').addClass('d-none');
                    row.find('.btn-edit-harga').removeClass('d-none');
                    row.find('.btn-save-harga').addClass('d-none').prop('disabled', false).html('<i class="bx bx-save"></i> Simpan');
                    row.find('.btn-cancel-edit').addClass('d-none');
                    input.data('original', newHarga);
                    
                    alert('Harga berhasil diupdate!');
                },
                error: function(xhr) {
                    alert('Gagal update harga: ' + (xhr.responseJSON?.message || 'Error'));
                    row.find('.btn-save-harga').prop('disabled', false).html('<i class="bx bx-save"></i> Simpan');
                }
            });
        });

        function formatNumberLocal(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    });
</script>
@endpush
