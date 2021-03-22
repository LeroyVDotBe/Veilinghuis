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

<script>
    //TODO better error parsing --> specific errors for password update on user profile page. (Fortify error)
    @error('current_password', 'updatePassword')
    $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Error',
        body: '{{ $message }}'
    })
    @enderror
    @error('password', 'updatePassword')
    $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Error',
        body: '{{ $message }}'
    })
    @enderror
    @error('password-confirm', 'updatePassword')
    $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Error',
        body: '{{ $message }}'
    })
    @enderror
</script>
