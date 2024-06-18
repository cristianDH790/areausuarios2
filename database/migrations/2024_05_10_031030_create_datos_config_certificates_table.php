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
        Schema::create('datos_config_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('certificate_id')->nullable()->constrained('certificates')->onDelete('set null');
            $table->string('key');
            $table->string('value')->nullable();
            $table->integer('x')->nullable()->default(0);
            $table->integer('y')->nullable()->default(0);
            $table->string('align')->nullable();
            $table->string('type_typography')->nullable()->default('ARIAL');
            $table->string('type_typography2')->nullable()->default('ARIAL');
            $table->integer('font_size')->nullable()->default(16);
            $table->string('color')->nullable();
            $table->boolean('painting')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_config_certificates');
    }
};