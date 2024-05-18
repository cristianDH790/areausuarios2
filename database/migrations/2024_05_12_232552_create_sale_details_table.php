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
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('service_id')->nullable()->constrained('services', 'id')->onDelete('set null');
            $table->unsignedInteger('sale_id')->constrained('sales', 'id')->onDelete('cascade');
            $table->double('price_service', 8, 2);
            $table->double('price_sale', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_details');
    }
};