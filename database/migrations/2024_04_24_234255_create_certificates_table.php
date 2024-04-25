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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained('services', 'id')->onDelete('set null');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('type_certificate_id')->nullable()->constrained('certificates', 'id')->onDelete('set null');
            $table->foreignId('module_id')->nullable()->constrained('modules', 'id')->onDelete('set null');
            $table->string('broadcast_date');
            $table->enum('status', ['pending', 'approved', 'rejected']);
            $table->string('photo_front');
            $table->string('photo_back');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
