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
        Schema::table('employers', function (Blueprint $table) {
            Schema::table('employers', function (Blueprint $table) {
                $table->text('address')->nullable(); // Address column (larger size)
                $table->string('city', 50)->nullable(); // City column (max 50 characters)
                $table->string('state', 50)->nullable(); // State column (max 50 characters)
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn(['address', 'city', 'state']);
        });
    }
};
