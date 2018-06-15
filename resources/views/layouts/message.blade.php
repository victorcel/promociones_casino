@if(Session::has('message'))
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script type="text/javascript">

        swal({
            title: "{{Session::get('message')}}",
            icon: "info",
        })

    </script>

@endif