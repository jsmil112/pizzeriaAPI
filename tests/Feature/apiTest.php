<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Product;
use App\Order;

class apiTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_get_products_returns_all_products() 
    {
        $products = Product::all();
        $products_array = $products->toArray();
        $response = $this->getJson('api/products');
        $response
            ->assertStatus(200)
            ->assertJsonCount(count($products))
            ->assertJson($products_array);
    }

    public function test_post_order()
    {
        $payload = [
            "name" => "Jared",
            "contact_number" => "51-2222-1231",
            "address" => "123 house st",
            "subtotal" => "123.45",
            "shipping" => "5.00",
            "total" => "128.45",
            "items" => [[
                "id" => 1,
                "quantity" => 2,
                "item_total" => "45.00"
            ],
            [
                "id" => 3,
                "quantity" => 1,
                "item_total" => "12.00"
            ],
            [
                "id" => 5,
                "quantity" => 1,
                "item_total" => "13.50"
            ]]
            ];

        $this->json('POST', 'api/order', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'created_at',
                    'updated_at',
                    'name',
                    'contact_number',
                    'address',
                    'subtotal',
                    'shipping',
                    'total',
                    'order_items',
                ],
            ]);
    }

    public function test_get_order() 
    {
        $order = factory(Order::class)->create();
        $response = $this->getJson('api/order/' . $order->id);
        $response
            ->assertStatus(200)
            ->assertJson($order->toArray());
    }
}
