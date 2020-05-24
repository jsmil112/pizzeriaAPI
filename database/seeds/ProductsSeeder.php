<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Reset table before seeding to avoid duplicates.
        Product::truncate();

        $products = [
            [
                'name' => 'Mozzarella',
                'category' => 'pizza',
                'dollar_price' => 10.00,
                'description' => 'Mozzarella cheese and tomato sauce',
            ],
            [
                'name' => 'Mushroom',
                'category' => 'pizza',
                'dollar_price' => 12.50,
                'description' => 'Mozzarella cheese, tomato sauce, and mushrooms',
            ],
            [
                'name' => 'Olive',
                'category' => 'pizza',
                'dollar_price' => 11.50,
                'description' => 'Mozzarella cheese, tomato sauce, and black olives',
            ],
            [
                'name' => 'Caprese',
                'category' => 'pizza',
                'dollar_price' => 13.00,
                'description' => 'Mozzarella cheese, tomato sauce, tomatoe slices, and basil',
            ],
            [
                'name' => 'Margherita',
                'category' => 'pizza',
                'dollar_price' => 15.00,
                'description' => 'Fresh Mozzarella cheese, tomato sauce, tomatoe slices, and basil',
            ],
            [
                'name' => 'Blue Cheese',
                'category' => 'pizza',
                'dollar_price' => 15.00,
                'description' => 'Mozzarella cheese, blue Cheese, and tomato sauce',
            ],
            [
                'name' => 'Veggie',
                'category' => 'pizza',
                'dollar_price' => 14.00,
                'description' => 'Mozzarella cheese, tomato sauce, and mixed vegetables',
            ],
            [
                'name' => 'White Broccoli',
                'category' => 'pizza',
                'dollar_price' => 13.50,
                'description' => 'Mozzarella cheese, white sauce, broccoli, and black olives',
            ],
        ];

        foreach($products as $product) {
            Product::create($product);
        }
    }
}
