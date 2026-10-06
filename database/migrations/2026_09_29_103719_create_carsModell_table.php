<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carsModell', function (Blueprint $table) {

            $table->id();

            $table->foreignId('carsManufact_id')
                  ->constrained('carsManufact')
                  ->onDelete('cascade');

            $table->string('name');
            $table->integer('year');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carsModell');
    }
};