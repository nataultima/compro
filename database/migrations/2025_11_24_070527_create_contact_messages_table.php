<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{


public function up(): void
{
    Schema::create('contact_messages', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nama pengirim
        $table->string('email'); // Email pengirim
        $table->string('phone')->nullable(); // Nomor telepon (boleh kosong)
        $table->text('message'); // Isi pesan
        $table->timestamps(); // Kolom created_at dan updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
