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
            $table->foreignId('type_service_id')->constrained('type_services', 'id')->onDelete('restrict');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('little_description')->nullable();
            $table->double('price', 8, 2);
            $table->double('price_discount', 8, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('code_service');
            $table->string('hours');
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->text('link_brochure')->nullable();
            $table->text('link_video')->nullable();
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
