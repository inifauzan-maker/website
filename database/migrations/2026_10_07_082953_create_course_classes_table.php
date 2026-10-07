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
        Schema::create('course_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained()->restrictOnDelete();
            $table->foreignId('course_program_id')->constrained()->restrictOnDelete();
            $table->string('name');
            $table->enum('learning_mode', ['offline', 'online', 'hybrid']);
            $table->string('teacher_name')->nullable();
            $table->unsignedSmallInteger('capacity');
            $table->unsignedBigInteger('price_rupiah');
            $table->boolean('is_published')->default(false);
            $table->index(['branch_id', 'learning_mode', 'is_published']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_classes');
    }
};
