@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Current auctions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Auctions</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row d-flex align-items-stretch">


                        @forelse($auctions as $auction)
                        <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch">
                            <div class="card bg-light w-100">
                                <div class="card-header text-muted border-bottom-0">
                                    {{$auction->name}}
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <ul class="ml-4 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-tag"></i></span> Lot N°: {{ $auction->lot_number }}</li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-clock"></i></span> Closing: {{ $auction->closing_date->format('d M Y - H:i') }}</li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-euro-sign"></i></span> Highest bid: € {{ number_format($auction->highest_bid, 2, ',', '.') }}</li>
                                            </ul>
                                            <p class="text-muted text-sm"><b>Description:</b> {{$auction->description}}</p>
                                            @if($auction->opening_date < \Carbon\Carbon::now() && $auction->closing_date > \Carbon\Carbon::now())
                                            <form action="{{ route('bids.store', $auction) }}" method="post">
                                                @csrf
                                                <div class="input-group input-group-sm">
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
                                            </form>
                                            @endif

                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="{{ asset($auction->picture) }}" alt="" class="img-rounded img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="{{ route('auctions.show', $auction) }}" class="btn btn-sm bg-primary">
                                            <i class="fas fa-search"></i> More info
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            No auctions
                        @endforelse



                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
