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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->constrained('users', 'id');
            $table->date('date_sale');
            $table->date('date_sale_pay');
            $table->double('total', 8, 2);
            $table->enum('status', ['paid', 'pending', 'refused', 'validate'])->default('validate');
            $table->string('voucher')->nullable();
            $table->string('num_transaction')->nullable()->unique();
            $table->unsignedInteger('bank_id')->nullable()->constrained('banks', 'id')->onDelete('set null');
            $table->enum('type_detail', ['boleta', 'factura'])->default('boleta');
            $table->string('sale_by');
            $table->text('description')->nullable();

            $table->text('description_validate')->nullable();
            $table->enum('debt', ['si', 'no'])->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};