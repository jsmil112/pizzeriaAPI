<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Product;

class apiTest extends TestCase
{
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
}
