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
        Schema::table('harddisks', function (Blueprint $table) {
            $table->text('keterangan')->nullable()->after('kapasitas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('harddisks', function (Blueprint $table) {
            $table->dropColumn('keterangan');
        });
    }
};
