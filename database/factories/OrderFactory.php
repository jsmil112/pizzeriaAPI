<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\Order_Item;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'contact_number' => $faker->phoneNumber,
        'address' => $faker->streetAddress,
        'subtotal' => $faker->randomFloat(2,1,500),
        'shipping' => 5.00,
        'total' => $faker->randomFloat(2,1,500)
    ];
});

$factory->afterCreating(Order::class, function ($order, $faker) {
    factory(Order_Item::class, 3)->create([
        'product_id' => $faker->unique()->numberBetween(1,8),
        'order_id' => $order->id,
    ]);
});
