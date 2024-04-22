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
        Schema::create('propretie_specificfourniture', function (Blueprint $table) {
            $table->id();
            $table->foreignId('propretie_id')->constrained();
            $table->foreignId('specificfourniture_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propretie_specificfourniture');
    }
};
