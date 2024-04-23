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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_service_id')->constrained();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('little_description');
            $table->double('price', 8, 2);
            $table->double('price_discount ', 8, 2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('code_service');
            $table->string('hours');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};