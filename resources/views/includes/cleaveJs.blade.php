@push('js')
    <script src="{{ asset('assets/libs/cleavejs/cleave.js') }}"></script>
    <script>
        // let formatRupiah = document.querySelector('.formatRupiah')
        document.querySelectorAll('.formatRupiah').forEach(function(el) {
            new Cleave(el,{
                numeral: true,
                numeralThousandsGroupStyle: 'thousand'
            })
        });

    </script>

@endpush
