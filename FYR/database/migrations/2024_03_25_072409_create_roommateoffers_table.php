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
        Schema::create('roommateoffers', function (Blueprint $table) {
            $table->id();
            $table->text('address');
            $table->boolean('roomtype')->nullable();
            $table->float('budget');
            $table->integer('numberofroommates');
            $table->boolean('petperson');
            $table->boolean('smoker');
            $table->boolean('gender');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('citie_id')->constrained()->OnDelete('cascade')->OnUpdate('cascade');
            $table->foreignId('housingtype_id')->constrained()->OnDelete('cascade')->OnUpdate('cascade');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roommateoffers');
    }
};
