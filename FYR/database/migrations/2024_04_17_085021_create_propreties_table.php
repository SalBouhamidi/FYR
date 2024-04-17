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
        Schema::create('propreties', function (Blueprint $table) {




            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('address');
            $table->float('price');
            $table->boolean('equipped');
            $table->float('surfacearea');
            $table->foreignId('housingtype_id')->constrained();
            $table->foreignId('citie_id')->constrained();
            $table->foreignId('user_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::dropIfExists('propreties');
    }
};
