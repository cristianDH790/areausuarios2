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
        Schema::create('exhibitor_service', function (Blueprint $table) {
            $table->foreignId('exhibitor_id')->nullable()->constrained('exhibitors', 'id')->onDelete('cascade');
            $table->foreignId('service_id')->nullable()->constrained('services', 'id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibitor_service');
    }
};