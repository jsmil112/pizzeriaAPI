<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','category','dollar_price','description'];

    // Instance is created with dollar price and euro price is then calculated and set.
    public function setDollarPriceAttribute($value)
    {
        $this->attributes['dollar_price'] = $value;
        $this->attributes['euro_price'] = round($value * .91);
    }
}
