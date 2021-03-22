@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">

                            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                            <p class="text-muted text-center">{{ Auth::user()->email }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-default w-100" data-toggle="modal" data-target="#change-password">
                                        Change password
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Placed bids</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Auction</th>
                                        <th>Closing</th>
                                        <th>Your placed bid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($auctions as $auction)
                                    <tr>
                                        <td><a href="{{ route('auctions.show', $auction) }}">{{$auction->name}}</a></td>
                                        <td>{{$auction->closing_date->format('d M Y - H:i')}} ({{ $auction->closing_date->diffForHumans() }})</td>
                                        <td>€ {{ number_format($auction->bids->max('bid')/100, 2, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No placed bids yet</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="change-password" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('user-password.update') }}" method="post">
                @csrf
                @method('put')
                <div class="modal-header">
                    <h4 class="modal-title">Change password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="current_password" class="col-sm-4 col-form-label">Current password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">New password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" name="password" placeholder="New password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-sm-4 col-form-label">Confirm password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Change password</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
