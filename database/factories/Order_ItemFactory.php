<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order_Item;
use Faker\Generator as Faker;

$factory->define(Order_Item::class, function (Faker $faker) {
    return [
        'quantity' => $faker->numberBetween(1,8),
    ];
});
