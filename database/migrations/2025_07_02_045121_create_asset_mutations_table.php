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
        Schema::create('asset_mutations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');

            $table->foreignId('old_location_id')->constrained('lokasis');
            $table->foreignId('new_location_id')->constrained('lokasis');

            $table->date('mutation_date');

            $table->foreignId('mutation_type_id')->constrained('tipe_mutasis'); // harus buat dulu tabel mutasi type
            $table->foreignId('kondisi_id')->constrained('kondisis'); // harus buat dulu tabel kondisi

            // $table->foreignId('kota_id')->constrained('kotas');
            $table->foreignId('bagian_id')->constrained('bagians');
            $table->text('notes')->nullable();

            $table->foreignId('user_id')->constrained('users');

//            $table->foreignId('created_by')->nullable()->constrained('users'); // Asumsi ada tabel users

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_mutations');
    }
};
