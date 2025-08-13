<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('agenda_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('tipe')->nullable(); // ujian, libur, dll
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agenda_sekolahs');
    }
};