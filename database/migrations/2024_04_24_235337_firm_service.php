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
        Schema::create('firm_service', function (Blueprint $table) {
            $table->foreignId('service_id')->nullable()->constrained('services', 'id')->onDelete('cascade');
            $table->foreignId('firm_id')->nullable()->constrained('firms', 'id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firm_service');
    }
};
