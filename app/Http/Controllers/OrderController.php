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
        $data = $request->input('data');

        $order = Order::create([
            'name' => $data['name'],
            'contact_number' => $data['contact_number'],
            'address' => $data['address'],
            'subtotal' => (float) $data['subtotal'],
            'shipping' => (float) $data['shipping'],
            'total' => (float) $data['total'],
        ]);
    
        foreach ($data['items'] as $item) {
            $order_item = Order_Item::create([
                'quantity' => $item['quantity'],
                'product_id' => $item['id'],
                'order_id' => $order->id,
            ]);
        }
    
        return response()->json(['data' => $order->fresh()], 200);
    }
}
