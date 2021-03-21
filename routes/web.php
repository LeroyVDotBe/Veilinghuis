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

// Auth routes worden afgehandeld door Laravel/fortify



Route::middleware(['auth'])->group(function () {

    Route::resource('/auctions', AuctionController::class)->except('index', 'show');
    Route::post('/auctions/{auction}/bid', [BidController::class, 'store'])->name('bids.store');

    Route::view('/thankyou', 'auction.thankyou')->name('thankyou');

    Route::view('/profile', 'profile.show');

});

Route::get('/', [AuctionController::class, 'index'] )->name('index');
Route::get('/auctions/{auction}', [AuctionController::class, 'show'] )->name('auctions.show');

