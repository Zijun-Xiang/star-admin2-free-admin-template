<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->unsignedBigInteger('OID');
            $table->unsignedBigInteger('FoodID');
            $table->unsignedBigInteger('PetID');
            $table->integer('Month');
            $table->integer('Year');
            $table->integer('Quantity')->default(1);
            $table->timestamps();

            $table->primary(['OID', 'FoodID', 'PetID', 'Month', 'Year']);
            $table->foreign('OID')->references('OID')->on('owners')->onDelete('cascade');
            $table->foreign('FoodID')->references('FoodID')->on('foods')->onDelete('cascade');
            $table->foreign('PetID')->references('PetID')->on('pets')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
