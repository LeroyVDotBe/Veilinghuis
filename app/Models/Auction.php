<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'opening_date', 'closing_date', 'opening_price', 'lot_number', 'increment_bid'
    ];

    protected $casts = [
        //casts attribute naar een  specifiek data type
        'opening_date' => 'datetime:Y-m-d H:i',
        'closing_date' => 'datetime:Y-m-d H:i'
    ];

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function getHighestBidAttribute()
    {
        if($this->bids->isNotEmpty()){
            return $this->bids->max('bid')/100;
        }else{
           return $this->opening_price/100;
        }
    }

    public function getBidIncrementAttribute()
    {
        return $this->increment_bid/100;
    }
}
