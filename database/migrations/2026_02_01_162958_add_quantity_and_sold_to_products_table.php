<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ✅ Do nothing (because quantity & sold already exist in create_products_table)
        // Keep this migration so Laravel doesn't get confused.
    }

    public function down(): void
    {
        // ✅ Do nothing
    }
};
