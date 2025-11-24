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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description')->nullable(); 
            $table->enum('type', ['text', 'image'])->default('text'); 
            $table->string('image')->nullable(); 
            $table->string('link')->nullable(); 
            $table->string('button_text')->nullable(); 
            $table->string('background_color')->nullable()->default('#ffffffff'); 
            $table->boolean('is_active')->default(true)->index(); 
            $table->timestamp('start_date')->nullable()->index(); 
            $table->timestamp('end_date')->nullable()->index(); 
            $table->unsignedInteger('order')->default(0)->index(); 

            $table->timestamps(); 
            $table->softDeletes(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};