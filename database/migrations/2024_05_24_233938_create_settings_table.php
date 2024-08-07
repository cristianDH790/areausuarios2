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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            //numeros
            $table->string('phone_sale', 20)->nullable();
            $table->string('phone_contact', 20)->nullable();
            //boleta
            $table->string('name_boleta')->nullable();
            $table->string('ruc_boleta')->nullable();
            $table->string('direccion_boleta')->nullable();
            $table->string('propietario_boleta')->nullable();
            $table->string('email_boleta')->nullable();
            $table->string('logo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};