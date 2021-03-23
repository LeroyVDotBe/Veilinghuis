<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuctionFormRequest;
use App\Http\Requests\UpdateAuctionFormRequest;
use App\Models\Auction;
use Storage;

class AuctionController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Auction::class, 'auction');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auctions = Auction::withCount('bids')->get();

        return view('auction.index', compact('auctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAuctionFormRequest $request)
    {
        $auction = new Auction($request->validated());
        $auction->picture = $request->file('upload')->storePublicly('auctions', 'public');
        $auction->opening_price = round($request->opening_price*100);
        $auction->increment_bid = round($request->increment_bid*100);
        $auction->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $auction)
    {
        return view('auction.show', compact('auction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        return view('auction.edit', compact('auction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuctionFormRequest $request, Auction $auction)
    {
        $auction->fill($request->validated());

        // Checks if the request has a new file, if yes -> current file removed, new file uploaded
        if ($request->hasFile('upload')) {
            Storage::disk('public')->delete($auction->picture);
            $auction->picture = $request->file('upload')->storePublicly('auctions', 'public');
        }

        $auction->opening_price = round($request->opening_price*100);
        $auction->increment_bid = round($request->increment_bid*100);
        $auction->save();

        // TODO validator to check if there are already bids placed on the auction
        // Option 1: Drop placed bids when this auction is edited
        // Option 2: Restrict editing auction when auction is already started

        return redirect()->route('auctions.show', $auction);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        $auction->delete();

        return redirect()->route('index');
    }
}
