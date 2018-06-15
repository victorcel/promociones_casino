@if(count($errors))
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        @foreach($errors->all() as $error)
        swal({
            title: "{{ $error }}",
            icon: "error",
        })
        @endforeach
    </script>

@endif