<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Pizza;

class PagesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_dashboard_page_(): void
    {
        $user = User::factory()->create();
        $this->seed();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/');

        $response->assertStatus(200);
        $response->assertSee('Dashboard');
    }

    public function test_pizza_page(): void
    {
        $user = User::factory()->create();
        $this->seed();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/pizzas');

        $response->assertStatus(200);
        $response->assertSee('Pizzas');
    }

    public function test_cart_page(): void
    {
        $user = User::factory()->create();
        $this->seed();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/pizzas/cart');

        $response->assertStatus(200);
        $response->assertSee('Cart');
    }

    public function test_order_page(): void
    {
        $user = User::factory()->create();
        $this->seed();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/orders');

        $response->assertStatus(200);
        $response->assertSee('Orders');
    }
    
    // public function test_pizzas_page(): void
    // {
    //     $user = User::factory()->create(['name' => 'Taylor']);
    //     $this->seed();
    //     $pizzas = Pizza::get();
    //     // dd($pizzas);
    //     // dd($user->name);
    //     $view = $this->view('pizzas.index', $pizzas);
        
    //     $view->assertSee($user->name);
    // }
}
