<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category'); // Prisma, Busway, Panel MV, Smart Panel, dll
            $table->text('description');
            $table->string('capacity')->nullable(); // 1000-4000A, 63-3200A, dll
            $table->string('badge_label')->nullable(); // Type Test, Kontrol, Smart Panel, dll
            $table->string('badge_color')->default('blue'); // blue, green, purple, red, indigo
            $table->string('image')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};