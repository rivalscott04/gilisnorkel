{{--<script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>--}}
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.css') }}">
@endpush
@push('js')
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
                token = '{{csrf_token()}}';
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
                        if(datatable !== undefined){
                            datatable.draw(true);
                        }else{
                            window.location.reload();
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });

            }

        });
    }
</script>
@endpush
