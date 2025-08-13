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
       Schema::create('absensis', function (Blueprint $table) {
    $table->id();
    $table->string('nama_sesi'); // contoh: "Absensi Hari Senin"
    $table->date('tanggal'); // hanya satu absensi per tanggal
    $table->foreignId('user_id')->constrained(); // guru
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
