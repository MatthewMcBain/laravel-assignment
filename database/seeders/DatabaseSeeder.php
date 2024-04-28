<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('pizzas')->insert([
            'pizza_name' => 'Margherita',
            // 'topping_name' => ['cheese', 'tomato sauce']
        ]);

        DB::table('pizzas')->insert([
            'pizza_name' => 'Gimme the Meat',
            // 'topping_name' => ['cheese', 'tomato sauce', 'pepperoni', 'ham', 'chicken', 'minced beef', 'sausage', 'bacon']
        ]);

        DB::table('pizzas')->insert([
            'pizza_name' => 'Veggie Delight',
            // 'topping_name' => ['cheese', 'tomato sauce', 'onions', 'green peppers', 'mushrooms', 'sweetcorn']
        ]);

        DB::table('pizzas')->insert([
            'pizza_name' => 'Make Mine Hot',
            // 'topping_name' => ['cheese', 'tomato sauce', 'chicken', 'onions', 'green peppers', 'jalapeno peppers']
        ]);


        DB::table('toppings')->insert([
            'topping_name' => 'cheese',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'tomato sauce',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'pepperoni',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'ham',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'minced beef',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'sausage',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'bacon',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'onions',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'green peppers',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'mushrooms',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'sweetcorn',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'jalapeno peppers',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'vegan cheese',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'pineapple',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'salami',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'olives',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'spicy beef',
        ]);
        DB::table('toppings')->insert([
            'topping_name' => 'hot dog pieces',
        ]);



        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
