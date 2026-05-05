<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Create categories from existing products data
        $categories = \Illuminate\Support\Facades\DB::table('products')->select('category')->distinct()->pluck('category')->filter();
        foreach($categories as $categoryName) {
            \Illuminate\Support\Facades\DB::table('categories')->insertOrIgnore([
                'name' => $categoryName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 2. Add category_id column
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('category');
        });

        // 3. Update products to map category to category_id
        $items = \Illuminate\Support\Facades\DB::table('products')->get();
        foreach ($items as $item) {
            if ($item->category) {
                $cat = \Illuminate\Support\Facades\DB::table('categories')->where('name', $item->category)->first();
                if ($cat) {
                    \Illuminate\Support\Facades\DB::table('products')->where('id', $item->id)->update(['category_id' => $cat->id]);
                }
            }
        }

        // 4. Drop the old column and add foreign key constraint
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->foreign('category_id')->references('id')->on('categories')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop foreign key and column
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');

            // Re-add category column
            $table->string('category')->nullable();
        });
    }
};
