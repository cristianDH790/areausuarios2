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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')->constrained('topics', 'id')->onDelete('cascade');
            $table->foreignId('material_id')->constrained('materials', 'id')->onDelete('cascade');
            $table->foreignId('video_id')->constrained('videos', 'id')->onDelete('cascade');
            $table->string('title');
            $table->integer('order')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};