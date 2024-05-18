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
        Schema::create('finance_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('finance_id')->constrained('finances', 'id')->onDelete('cascade');
            $table->decimal('payment_amount', 10, 2);
            $table->date('date_pay')->nullable();
            $table->text('voucher')->nullable();
            $table->text('descriptions')->nullable();
            $table->enum('status', ['pending', 'paid'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_details');
    }
};