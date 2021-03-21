<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Bid;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Auction $auction)
    {
        // In deze controller valideer ik de "bid" waarde in de controller zelf, deze moet steeds hoger zijn als de hoogst geboden waarde
        $validated = $request->validate([
            'bid' => 'required|numeric|gt:'.$auction->highest_bid,
        ]);

        //Serverside check of de bieding binnen het tijdslot valt.
        if($auction->opening_date < Carbon::now() && $auction->closing_date > Carbon::now()){

            $bid = new Bid();
            $bid->bid = round($validated['bid']*100);
            $bid->user()->associate(Auth::user());
            $bid->auction()->associate($auction);
            $bid->save();

            return redirect()->route('thankyou');

        }else{
            throw ValidationException::withMessages(['Not allowed to place a bid, is the auction already closed?']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function show(Bid $bid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function edit(Bid $bid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bid $bid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bid $bid)
    {
        //
    }
}
