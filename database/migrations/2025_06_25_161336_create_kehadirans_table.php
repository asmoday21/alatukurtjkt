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
        Schema::create('kehadirans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('absensi_id')->constrained()->onDelete('cascade');
    $table->foreignId('user_id')->constrained(); // siswa
    $table->timestamp('waktu_hadir');
    $table->timestamps();

    $table->unique(['absensi_id', 'user_id']); // hanya 1x hadir per absensi
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadirans');
    }
};
