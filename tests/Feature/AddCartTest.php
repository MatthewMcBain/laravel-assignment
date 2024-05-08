<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Pizza;

class AddCartTest extends TestCase
{
    /**
     * Testing the pizzas can be added to the cart.
     */
    
    public function test_add_pizza_to_cart(): void
    {
        $this->seed();
        $pizzas = Pizza::get();
        $cart = session('cart', collect([]));
        $cart->push($pizzas[0]);
        session(['cart' => $cart]);
        $this->assertContains($pizzas[0], $cart);
        $this->assertContains($pizzas[0], session('cart', collect([])));
        $this->assertNotContains($pizzas[1], $cart);
        $this->assertNotContains($pizzas[1], session('cart', collect([])));        
    }

    public function test_add_pizzas_to_cart(): void
    {
        $this->seed();
        $pizzas = Pizza::get();
        $cart = session('cart', collect([]));
        for ($i = 0; $i < 3; $i++) {
            $cart->push($pizzas[$i]);
        }
        session(['cart' => $cart]);
        for ($i = 0; $i < 3; $i++) {
            $this->assertContains($pizzas[$i], $cart);
            $this->assertContains($pizzas[$i], session('cart', collect([])));           
        }
        $this->assertNotContains($pizzas[3], $cart);
        $this->assertNotContains($pizzas[3], session('cart', collect([])));
    }
}
