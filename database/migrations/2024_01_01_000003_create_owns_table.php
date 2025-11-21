<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('owns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained()->cascadeOnDelete();
            $table->foreignId('pet_id')->constrained()->cascadeOnDelete();
            $table->date('acquired_at')->nullable();
            $table->timestamps();

            $table->unique(['owner_id', 'pet_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('owns');
    }
};
