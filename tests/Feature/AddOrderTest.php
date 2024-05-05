<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Pizza;
use App\Models\Order;

class AddOrderTest extends TestCase
{
    /**
     * Testing the pizzas from the cart can be added to the order.
     */
    
    public function test_add_pizzas_from_cart_to_order(): void
    {
        $user = User::factory()->create(['name' => 'Taylor']);
        $this->seed();
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/pizzas/cart');
        $pizzas = Pizza::get();
        // dd($pizzas[0]->pizza_name);
        $cart = session('cart', collect([]));
        for ($i = 0; $i < 3; $i++) {
            $cart->push($pizzas[$i]);
        }
        // $cart->push($pizzas[1]);
        session(['cart' => $cart]);
        // dd($cart);
        for ($i = 0; $i < 3; $i++) {
            $this->assertContains($pizzas[$i], session('cart', collect([])));
            $this->assertContains($pizzas[$i], $cart);
        }

        dd(orders());
        $order = $cart->orders()->create();
        $order = $cart->user()->orders()->create();
        $order->pizzas()->sync($cart->pizzas);
        dd($order);
        // $cart->session()->forget('cart');
    }
}
