<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->bigIncrements('OID');
            $table->string('LastName');
            $table->string('Street')->nullable();
            $table->string('City')->nullable();
            $table->string('ZipCode', 10)->nullable();
            $table->string('State', 50)->nullable();
            $table->integer('Age')->nullable();
            $table->decimal('AnnualIncome', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
