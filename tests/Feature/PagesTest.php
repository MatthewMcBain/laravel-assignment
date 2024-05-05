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
    use RefreshDatabase;

    public function test_missing_page_does_not_exist(): void
    {
        $response = $this->get('/missing-page');

        $response->assertStatus(404);
    }

    public function test_welcome_page_exists(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Pizzas');
        $response->assertSee('Toppings');
    }

    public function test_dashboard_page_exists(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/');

        $response->assertStatus(200);
        $response->assertSee('Dashboard');
    }

    public function test_pizza_page_exists(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/pizzas');

        $response->assertStatus(200);
        $response->assertSee('Pizzas');
    }

    public function test_cart_page_exists(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/pizzas/cart');

        $response->assertStatus(200);
        $response->assertSee('Cart');
    }

    public function test_order_page_exists(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/orders');

        $response->assertStatus(200);
        $response->assertSee('Orders');
    }
}
