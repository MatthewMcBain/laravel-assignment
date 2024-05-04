<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MissingPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_missing_page_does_not_exist(): void
    {
        $response = $this->get('/missing-page');

        $response->assertStatus(404);
    }
}
