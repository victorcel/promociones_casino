@if(Session::has('info'))
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script  type="text/javascript">
        swal({
            title: "{{Session::get('info')}}",
            icon: "success",
            showConfirmButton: true,
            //dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    // swal("Error!!!", "", "error");
                    window.location.href = "{{ route('login') }}";
                    //return fetch('https://loteria.local/login');
                }else {
                    window.location.href = "{{ route('login') }}";
                }
            });

    </script>
@endif