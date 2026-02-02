<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

/**
 * ProductSeeder inserts sample bakery products (cakes, cookies, pastries).
 */
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Chocolate Fudge Cake',
                'description' => 'Rich, moist chocolate cake layered with fudge frosting. A classic favorite.',
                'price' => 24.99,
                'category' => 'cakes',
                'stock' => 12,
                'image' => null,
            ],
            [
                'name' => 'Vanilla Bean Cupcakes',
                'description' => 'Light vanilla cupcakes with real vanilla bean and buttercream frosting.',
                'price' => 3.50,
                'category' => 'cakes',
                'stock' => 48,
                'image' => null,
            ],
            [
                'name' => 'Chocolate Chip Cookies',
                'description' => 'Soft, chewy cookies loaded with milk chocolate chips. Baked fresh daily.',
                'price' => 2.25,
                'category' => 'cookies',
                'stock' => 60,
                'image' => null,
            ],
            [
                'name' => 'Oatmeal Raisin Cookies',
                'description' => 'Hearty oatmeal cookies with plump raisins and a hint of cinnamon.',
                'price' => 2.50,
                'category' => 'cookies',
                'stock' => 40,
                'image' => null,
            ],
            [
                'name' => 'Butter Croissant',
                'description' => 'Flaky, buttery French-style croissant. Perfect with coffee.',
                'price' => 4.00,
                'category' => 'pastries',
                'stock' => 30,
                'image' => null,
            ],
            [
                'name' => 'Apple Turnover',
                'description' => 'Puff pastry filled with spiced apple and dusted with sugar.',
                'price' => 4.50,
                'category' => 'pastries',
                'stock' => 20,
                'image' => null,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
