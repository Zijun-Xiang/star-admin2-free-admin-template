<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('owns', function (Blueprint $table) {
            $table->unsignedBigInteger('PetID');
            $table->integer('Year');
            $table->unsignedBigInteger('OID');
            $table->integer('PetAgeatOwnership')->nullable();
            $table->decimal('PricePaid', 10, 2)->nullable();
            $table->timestamps();

            $table->primary(['PetID', 'Year', 'OID']);
            $table->foreign('PetID')->references('PetID')->on('pets')->onDelete('cascade');
            $table->foreign('OID')->references('OID')->on('owners')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('owns');
    }
};
