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
        Schema::create('certificate_firm', function (Blueprint $table) {
            $table->foreignId('certificate_id')->nullable()->constrained('certificates', 'id')->onDelete('set null');
            $table->foreignId('firm_id')->nullable()->constrained('firms', 'id')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_firms');
    }
};