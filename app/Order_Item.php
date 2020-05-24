<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    protected $fillable = ['quantity','product_id','order_id'];
    protected $with = ['product'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
