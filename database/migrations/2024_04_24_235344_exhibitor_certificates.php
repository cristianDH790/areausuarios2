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
        Schema::create('exhibitor_certificate', function (Blueprint $table) {
            $table->foreignId('exhibitor_id')->nullable()->constrained('exhibitors', 'id')->onDelete('set null');
            $table->foreignId('certificate_id')->nullable()->constrained('certificates', 'id')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibitor_certificates');
    }
};
