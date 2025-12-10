{{--<script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>--}}
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.css') }}">
@endpush
@push('js')
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.js') }}"></script>
<script>
    function fn_deleteData(url)
    {
        Swal.fire({
            title:"Yakin akan dihapus ?",
            text:"Data akan dihapus secara permanent!",
            icon:"warning",
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-primary me-3 w-300',
                cancelButton: 'btn btn-danger',
                title : 'mb-0 p-0',
                icon : 'w-20 h-20'
            },
            buttonsStyling: false
        }).then(function(res) {
            if(res.value){
                var token = '{{csrf_token()}}';
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "_method": 'DELETE',
                        "_token": token,
                    },
                    success: function (respon){
                        console.log(respon);
                        if(respon.success){
                            Swal.fire({
                                title: 'Berhasil!',
                                text: respon.success,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(function(){
                                if(typeof datatable !== 'undefined'){
                                    datatable.draw(false);
                                }else{
                                    window.location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: respon.error || 'Terjadi kesalahan',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        var errorMessage = 'Terjadi kesalahan saat menghapus data';
                        if(xhr.responseJSON && xhr.responseJSON.error){
                            errorMessage = xhr.responseJSON.error;
                        } else if(xhr.responseJSON && xhr.responseJSON.message){
                            errorMessage = xhr.responseJSON.message;
                        }
                        Swal.fire({
                            title: 'Error!',
                            text: errorMessage,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });

            }

        });
    }
</script>
@endpush
