<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paragrafs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materi_id')->constrained()->onDelete('cascade');
            $table->text('teks');
            $table->string('video')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paragrafs');
    }
};
