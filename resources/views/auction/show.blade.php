@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$auction->name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Auction</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">{{$auction->name}}</h3>
                            <div class="col-12">
                                <img src="{{ asset("storage/".$auction->picture) }}" class="product-image" alt="Product Image">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{$auction->name}}</h3>
                            <p>{{ $auction->description }}</p>
                            <hr>
                            <ul class="ml-4 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-tag"></i></span> Lot N°: {{ $auction->lot_number }}</li>
                                <li class="small"><span class="fa-li"><i class="fas fa-clock"></i></span> Opening: {{ $auction->opening_date->format('d M Y - H:i') }} ({{ $auction->opening_date->diffForHumans() }})</li>
                                <li class="small"><span class="fa-li"><i class="fas fa-clock"></i></span> Closing: {{ $auction->closing_date->format('d M Y - H:i') }} ({{ $auction->closing_date->diffForHumans() }})</li>
                                <li class="small"><span class="fa-li"><i class="fas fa-euro-sign"></i></span> Opening price: € {{ number_format($auction->opening_price/100, 2, ',', '.') }}</li>
                            </ul>
                            @if($auction->opening_date < \Carbon\Carbon::now() && $auction->closing_date > \Carbon\Carbon::now())
                            <form action="{{ route('bids.store', $auction) }}" method="post">
                                @csrf
                                <div class="mt-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-euro-sign"></i>
                                            </span>
                                        </div>
                                        <input type="number" min="{{$auction->highest_bid + $auction->bid_increment}}" value="{{$auction->highest_bid + $auction->bid_increment}}" step="{{$auction->bid_increment}}" class="form-control" name="bid">
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-primary btn-flat">Place bid</button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            @endif
                            <div class="bg-secondary disabled py-2 px-3 mt-4">
                                <h2 class="mb-0">
                                    Highest bid: € {{ number_format($auction->highest_bid, 2, ',', '.') }}
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">All placed bids</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3 w-100" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        @foreach($auction->bids->reverse() as $bid)
                                            <tr>
                                                <th style="width:50%">{{$bid->user->name}}</th>
                                                <td>€ {{ number_format($bid->bid/100, 2, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
