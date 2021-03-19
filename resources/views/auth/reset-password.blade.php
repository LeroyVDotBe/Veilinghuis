@extends('layout.master-auth')
@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href="#">Veilinghuis</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Type in your new password</p>

                <form action="{{route('password.update')}}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Reset password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
