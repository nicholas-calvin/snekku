<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('products')->insert([
            // SNACK
            [
                'category_id' => '1',
                'name' => 'Basreng Crispy',
                'price' => 15000 ,
                'imgPath' => 'assets/snack/basreng.png'
            ],
            [
                'category_id' => '1',
                'name' => 'Big Smoke Burger',
                'price' => 15000,
                'imgPath' => 'assets/snack/burger.png'
            ],
            [
                'category_id' => '1',
                'name' => 'Crispy Corndog',
                'price' => 15000,
                'imgPath' => 'assets/snack/corndog.png'
            ],
            [
                'category_id' => '1',
                'name' => 'Seaweed Frenchfries',
                'price' => 15000,
                'imgPath' => 'assets/snack/frenchfries.png'
            ],
            [
                'category_id' => '1',
                'name' => 'Smoke Turki Kebab',
                'price' => 15000,
                'imgPath' => 'assets/snack/kebab.png'
            ],
            [
                'category_id' => '1',
                'name' => 'Pisang Goreng Krispi',
                'price' => 2500,
                'imgPath' => 'assets/snack/pisang_goreng.png'
            ],
            [
                'category_id' => '1',
                'name' => 'Risoles Mayonaise',
                'price' => 2500,
                'imgPath' => 'assets/snack/risoles.png'
            ],
            [
                'category_id' => '1',
                'name' => 'Beef Sandwich',
                'price' => 15000,
                'imgPath' => 'assets/snack/sandwich.png'
            ],
            // DESSERT
            [
                'category_id' => '2',
                'name' => 'Cold Blackcurrant Jelly',
                'price' => 200000,
                'imgPath' => 'assets/dessert/blackcurrant_jelly.png'
            ],
            [
                'category_id' => '2',
                'name' => 'Medium Caramel Cake',
                'price' => 130000,
                'imgPath' => 'assets/dessert/caramel_cake.png'
            ],
            [
                'category_id' => '2',
                'name' => 'Big Caramel Pudding',
                'price' => 200000,
                'imgPath' => 'assets/dessert/caramel_pudding.png'
            ],
            [
                'category_id' => '2',
                'name' => 'Strawberry Gelatin Dessert',
                'price' => 50000,
                'imgPath' => 'assets/dessert/gelatin_dessert.png'
            ],
            [
                'category_id' => '2',
                'name' => 'Macaroons (12 Pcs)',
                'price' => 30000,
                'imgPath' => 'assets/dessert/macaroons.png'
            ],
            [
                'category_id' => '2',
                'name' => 'Moouse Dark Chocolate',
                'price' => 150000,
                'imgPath' => 'assets/dessert/moouse_chocolate.png'
            ],
            [
                'category_id' => '2',
                'name' => 'Fruit Pancake',
                'price' => 50000,
                'imgPath' => 'assets/dessert/pancake.png'
            ],
            [
                'category_id' => '2',
                'name' => 'Big Red Velvet Cake',
                'price' => 200000,
                'imgPath' => 'assets/dessert/redvelvet_cake.png'
            ],
            // BEVERAGE
            [
                'category_id' => '3',
                'name' => 'Tall Brown Sugar Boba',
                'price' => 25000,
                'imgPath' => 'assets/beverage/brownsugar_boba.png'
            ],
            [
                'category_id' => '3',
                'name' => 'Es Cendol',
                'price' => 15000,
                'imgPath' => 'assets/beverage/cendol.png'
            ],
            [
                'category_id' => '3',
                'name' => 'Es Cincau',
                'price' => 15000,
                'imgPath' => 'assets/beverage/cincau.png'
            ],
            [
                'category_id' => '3',
                'name' => 'Ice Coconut Milk',
                'price' => 15000,
                'imgPath' => 'assets/beverage/coconut_milk.png'
            ],
            [
                'category_id' => '3',
                'name' => 'Tall Ice Coffee',
                'price' => 25000,
                'imgPath' => 'assets/beverage/icecoffee.png'
            ],
            [
                'category_id' => '3',
                'name' => 'Tall Strawberry Juice',
                'price' => 25000,
                'imgPath' => 'assets/beverage/strawberry_juice.png'
            ],
            [
                'category_id' => '3',
                'name' => 'Tall Strawberry Milk',
                'price' => 25000,
                'imgPath' => 'assets/beverage/strawberry_milk.png'
            ]
        ]);
    }
}
