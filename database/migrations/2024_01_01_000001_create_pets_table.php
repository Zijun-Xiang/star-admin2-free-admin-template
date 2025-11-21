<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->bigIncrements('PetID');
            $table->string('Name');
            $table->integer('Age')->nullable();
            $table->string('Street')->nullable();
            $table->string('City')->nullable();
            $table->string('ZipCode', 10)->nullable();
            $table->string('State', 50)->nullable();
            $table->string('TypeofPet')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
