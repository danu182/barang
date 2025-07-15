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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('restrict'); // Foreign key reference
            $table->foreignId('pelanggan_id')->constrained('pelanggans')->onDelete('restrict'); // Foreign key reference

            $table->string('kodeBarang');
            $table->string('kodeBarangUse');
            $table->string('namaBarang');
            $table->string('merek')->nullable();
            $table->string('model')->nullable();
            $table->string('nomorSeri')->nullable();
            $table->date('tanggalPerolehan')->nullable();
            $table->string('hargaPerolehan')->nullable();
            $table->string('vendor')->nullable();
            $table->text('catatan')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
