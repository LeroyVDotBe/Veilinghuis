@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All auctions</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Auctions</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All auctions</h3>
                                <div class="card-tools">
                                    <a href="{{ route('auctions.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Create new auction</a>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Opening date</th>
                                            <th>Closing date</th>
                                            <th>Number of bids</th>
                                            <th>Highest bid</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($auctions as $auction)
                                        <tr>
                                            <td>{{ $auction->id }}</td>
                                            <td>{{ $auction->name }}</td>
                                            <td>{{ $auction->opening_date->format('d M Y - H:i') }}</td>
                                            <td>{{ $auction->closing_date->format('d M Y - H:i') }}</td>
                                            <td>{{ $auction->bids_count }}</td>
                                            <td>€ {{ number_format($auction->highest_bid, 2, ',', '.') }}</td>
                                            <td>
                                                <form action="{{ route('auctions.destroy', $auction) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ route('auctions.show', $auction) }}" class="btn btn-default">
                                                            <i class="fas fa-search"></i>
                                                        </a>
                                                        <a href="{{ route('auctions.edit', $auction) }}" class="btn btn-default">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @empty
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

