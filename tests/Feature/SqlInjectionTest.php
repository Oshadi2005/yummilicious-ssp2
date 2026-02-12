<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SqlInjectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function sql_injection_input_does_not_break_the_application()
    {
        // Create sample data
        Product::create([
            'name' => 'Chocolate Cookie',
            'description' => 'Test product',
            'price' => 2.50,
            'category' => 'cookies',
        ]);

        // Simulated SQL injection style input
        $maliciousInput = "test' OR '1'='1";

        // Call a route that reads user input (change if needed)
        $response = $this->get('/products?search=' . urlencode($maliciousInput));

        // App should NOT crash
        $response->assertStatus(200);

        // App should NOT return all products
        $response->assertDontSee('Chocolate Cookie');
    }
}
