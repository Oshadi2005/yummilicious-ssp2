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
                'quantity' => 12,
                'image' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=500&auto=format&fit=crop&q=60',
            ],
            [
                'name' => 'Vanilla Bean Cupcakes',
                'description' => 'Light vanilla cupcakes with real vanilla bean and buttercream frosting.',
                'price' => 3.50,
                'category' => 'cakes',
                'quantity' => 48,
                'image' => 'https://images.unsplash.com/photo-1486427944299-d1955d23e34d?w=500&auto=format&fit=crop&q=60',
            ],
            [
                'name' => 'Chocolate Chip Cookies',
                'description' => 'Soft, chewy cookies loaded with milk chocolate chips. Baked fresh daily.',
                'price' => 2.25,
                'category' => 'cookies',
                'quantity' => 60,
                'image' => 'https://images.unsplash.com/photo-1499636136210-6f4ee915583e?w=500&auto=format&fit=crop&q=60',
            ],
            [
                'name' => 'Oatmeal Raisin Cookies',
                'description' => 'Hearty oatmeal cookies with plump raisins and a hint of cinnamon.',
                'price' => 2.50,
                'category' => 'cookies',
                'quantity' => 40,
                'image' => 'https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=500&auto=format&fit=crop&q=60',
            ],
            [
                'name' => 'Butter Croissant',
                'description' => 'Flaky, buttery French-style croissant. Perfect with coffee.',
                'price' => 4.00,
                'category' => 'pastries',
                'quantity' => 30,
                'image' => 'https://images.unsplash.com/photo-1549903072-7e6e0bedb7fb?w=500&auto=format&fit=crop&q=60',
            ],
            [
                'name' => 'Apple Turnover',
                'description' => 'Puff pastry filled with spiced apple and dusted with sugar.',
                'price' => 4.50,
                'category' => 'pastries',
                'quantity' => 20,
                'image' => 'https://images.unsplash.com/photo-1601000938259-9e92002320b2?w=500&auto=format&fit=crop&q=60',
            ],
        ];

        foreach ($products as $productData) {
            $categoryName = $productData['category'];
            $category = \App\Models\Category::firstOrCreate(['name' => $categoryName]);

            unset($productData['category']);
            $productData['category_id'] = $category->id;

            Product::create($productData);
        }
    }
}
