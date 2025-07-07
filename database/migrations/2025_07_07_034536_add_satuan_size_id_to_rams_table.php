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
        Schema::table('rams', function (Blueprint $table) {
            $table->foreignId('satuanSize_id')->constrained('satuan_sizes')->onDelete('cascade')->after('kapasitas'); // Foreign key reference
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rams', function (Blueprint $table) {
            $table->dropColumn('satuanSize_id');
        });
    }
};
