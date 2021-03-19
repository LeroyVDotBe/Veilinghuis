@extends('layout.master-auth')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#">Veilinghuis</a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Fill in your email to recover your password</p>

                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Recover password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
