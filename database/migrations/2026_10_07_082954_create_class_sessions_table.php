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
        Schema::create('class_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_class_id')->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger('sequence');
            $table->enum('meeting_mode', ['offline', 'online']);
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->string('location')->nullable();
            $table->text('meeting_url')->nullable();
            $table->unique(['course_class_id', 'sequence']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_sessions');
    }
};
