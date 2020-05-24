<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name','contact_number','address', 'subtotal', 'shipping', 'total'];
    protected $with = ['order_items'];

    public function order_items()
    {
        return $this->hasMany('App\Order_Item');
    }
}
