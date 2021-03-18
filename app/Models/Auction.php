<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'picture', 'opening_date', 'closing_date', 'opening_price', 'lot_number'
    ];

    protected $casts = [
        //casts attribute to specific data type
        'opening_date' => 'datetime:Y-m-d H:i',
        'closing_date' => 'datetime:Y-m-d H:i'
    ];

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
}
