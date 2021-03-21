<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuctionFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            //'upload' => 'image|size:512',
            'opening_date' => 'required|date|before:closing_date',
            'closing_date' => 'required|date|after:opening_date',
            'opening_price' => 'required|integer',
            'lot_number' => 'string|max:255',
            'increment_bid' => 'integer|min:1',
        ];
    }
}
