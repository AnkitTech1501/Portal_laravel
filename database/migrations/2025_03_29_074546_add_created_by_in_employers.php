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
            $table->string('is_publish')->default(0);
            $table->string('is_verfied')->default(0);
            $table->string('is_delete')->default(0);
            $table->string('created_by')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn(['created_by' , 'is_publish', 'is_verfied', 'is_delete']);
        });
    }
};
