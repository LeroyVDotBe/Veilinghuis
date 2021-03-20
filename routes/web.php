<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\BidController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $auctions = \App\Models\Auction::all();
    return view('dashboard', compact('auctions'));
});

// Auth routes are handled by Laravel/Fortify


Route::resource('/auctions', AuctionController::class);
Route::post('/autions/{auction}/bid', [BidController::class, 'store'])->name('bids.store');

