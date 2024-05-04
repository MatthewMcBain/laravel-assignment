<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $pizzaCollection = collect([
            ['Margherita', 'cheese, tomato sauce', 'Small', 8],
            ['Margherita', 'cheese, tomato sauce', 'Medium', 9],
            ['Margherita', 'cheese, tomato sauce', 'Large', 12],
            ['Gimme the Meat', 'cheese, tomato sauce, pepperoni, ham, chicken, minced beef, sausage, bacon', 'Small', 11],
            ['Gimme the Meat', 'cheese, tomato sauce, pepperoni, ham, chicken, minced beef, sausage, bacon', 'Medium', 14.50],
            ['Gimme the Meat', 'cheese, tomato sauce, pepperoni, ham, chicken, minced beef, sausage, bacon', 'Large', 16.50],
            ['Veggie Delight', 'cheese, tomato sauce, onions, green peppers, mushrooms, sweetcorn', 'Small', 10],
            ['Veggie Delight', 'cheese, tomato sauce, onions, green peppers, mushrooms, sweetcorn', 'Medium', 13],
            ['Veggie Delight', 'cheese, tomato sauce, onions, green peppers, mushrooms, sweetcorn', 'Large',  15],
            ['Make Mine Hot', 'cheese, tomato sauce, chicken, onions, green peppers, jalapeno peppers', 'Small', 11],
            ['Make Mine Hot', 'cheese, tomato sauce, chicken, onions, green peppers, jalapeno peppers', 'Medium', 13],
            ['Make Mine Hot', 'cheese, tomato sauce, chicken, onions, green peppers, jalapeno peppers', 'Large', 15]
        ]);

        $pizzaCollection->eachSpread(function (string $name, string $description, string $size, float $price) {
            DB::table('pizzas')->insert([
                'pizza_name' => $name,
                'description' => $description,
                'size' => $size,
                'price' => $price,
            ]);
        });

        $toppingCollection = collect(['cheese', 'tomato sauce', 'pepperoni', 'ham', 'chicken', 'minced beef', 
        'sausage', 'bacon', 'onions', 'green peppers', 'mushrooms', 'sweetcorn', 'jalapeno peppers', 'vegan cheese', 
        'pineapple', 'salami', 'olives', 'spicy beef', 'hot dog pieces']);

        $toppingCollection->each(function (string $topping) {
            DB::table('toppings')->insert([
                'topping_name' => $topping,
            ]);
        });
    }
}
