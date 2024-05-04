<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class DashboardTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_dashboard_page(): void
    {
        $user = User::factory()->create();
        $this->seed();
 
        $response = $this->actingAs($user)
                     ->withSession(['banned' => false])
                     ->get('/');

        $response->assertStatus(200);
        $response->assertSee('Dashboard');
        $response->assertDontSee('pizzas');
        $response->assertDontSee('orders');
    }
}
