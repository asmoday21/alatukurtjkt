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
    Schema::table('materis', function (Blueprint $table) {
        $table->text('poin_penting')->nullable();
        $table->text('kesimpulan')->nullable();
    });
}

public function down(): void
{
    Schema::table('materis', function (Blueprint $table) {
        $table->dropColumn(['poin_penting', 'kesimpulan']);
    });
}

};
