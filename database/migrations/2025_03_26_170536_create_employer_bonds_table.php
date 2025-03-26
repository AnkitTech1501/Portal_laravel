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
        Schema::create('employer_bonds', function (Blueprint $table) {
            $table->id();
            $table->integer('bond_duration')->nullable(); // Duration in years, e.g., 1 for 1 year, 2 for 2 years, etc.
            $table->foreignId('employer_id')->constrained('employers')->onDelete('cascade'); // Foreign key relation to employer
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_bonds');
    }
};
