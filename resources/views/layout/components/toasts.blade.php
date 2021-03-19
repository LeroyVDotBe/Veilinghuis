@if($errors->any())
    <script>
        @foreach ($errors->all() as $error)
        $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Error',
            body: '{{$error}}'
        })
        @endforeach
    </script>
@endif
