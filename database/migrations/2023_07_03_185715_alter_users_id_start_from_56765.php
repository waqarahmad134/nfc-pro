<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Set the starting ID to 56765
        DB::statement('ALTER TABLE users AUTO_INCREMENT=56765;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need to reverse the alteration
    }
};
