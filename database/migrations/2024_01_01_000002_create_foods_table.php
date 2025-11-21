<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->bigIncrements('FoodID');
            $table->string('Name');
            $table->string('Brand')->nullable();
            $table->string('TypeofFood')->nullable();
            $table->decimal('Price', 10, 2)->nullable();
            $table->decimal('ItemWeight', 8, 2)->nullable();
            $table->string('ClassofFood')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
