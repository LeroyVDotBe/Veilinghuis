@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>New auction</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">New auction</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <form action="{{ route('auctions.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Auction</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Auction name<span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="lot_number">Lot number</label>
                                    <input type="text" id="lot_number" name="lot_number" class="form-control" value="{{ old('lot_number') }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description<span class="text-danger">*</span></label>
                                    <textarea id="description" name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="upload">Picture<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="upload" name="upload">
                                            <label class="custom-file-label" for="upload">Choose picture</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="opening_price">Opening price<span class="text-danger">*</span></label>
                                    <input type="number" id="opening_price" name="opening_price" class="form-control" value="{{ old('opening_price') }}">
                                </div>
                                <div class="form-group">
                                    <label for="increment_bid">Price increment<span class="text-danger">*</span></label>
                                    <input type="number" id="increment_bid" name="increment_bid" class="form-control" value="{{ old('increment_bid', 1) }}">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="opening_date">Opening date<span class="text-danger">*</span></label>
                                    <input type="datetime-local" id="opening_date" name="opening_date" class="form-control" value="{{ old('opening_date') }}">
                                </div>
                                <div class="form-group">
                                    <label for="closing_date">Closing date<span class="text-danger">*</span></label>
                                    <input type="datetime-local" id="closing_date" name="closing_date" class="form-control" value="{{ old('closing_date') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Save Changes" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection

