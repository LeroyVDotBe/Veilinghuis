@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thank you</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thank you</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container text-center">
            <div class="text-center mt-4">
                <h2 class="headline text-success text-center">Thankyou</h2>
                <p>You have succesfully placed your bid!</p>
                <a href="{{ url()->previous() }}" class="btn btn-secondary"> Go back</a>
            </div>
        </div>

    </section>
</div>
@endsection
