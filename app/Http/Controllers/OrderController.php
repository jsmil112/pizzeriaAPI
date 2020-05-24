<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Order_Item;

class OrderController extends Controller
{
    public function show(Order $order){
        return $order;
    }

    public function store(Request $request){
        $order = Order::create([
            'name' => $request->input('name'),
            'contact_number' => $request->input('contact_number'),
            'address' => $request->input('address'),
            'subtotal' => (float) $request->input('subtotal'),
            'shipping' => (float) $request->input('shipping'),
            'total' => (float) $request->input('total'),
        ]);
    
        foreach ($request->input('items') as $item) {
            $order_item = Order_Item::create([
                'quantity' => $item['quantity'],
                'product_id' => $item['id'],
                'order_id' => $order->id,
            ]);
        }
    
        return response()->json(['data' => $order->fresh()], 200);
    }
}
