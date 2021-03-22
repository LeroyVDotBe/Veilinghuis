<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuctionFormRequest;
use App\Models\Auction;
use Illuminate\Http\Request;
use Storage;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auction.index');
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
    public function store(AuctionFormRequest $request)
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
    public function update(AuctionFormRequest $request, Auction $auction)
    {
        $auction->fill($request->validated());
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
