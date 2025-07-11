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
        Schema::create('harddisks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('barang_id')->constrained('barangs')->onDelete('restrict'); // Foreign key referenc
            $table->foreignId('tipeHardDisk_id')->constrained('tipe_hard_disks')->onDelete('restrict'); // Foreign key referenc
            $table->string('kapasitas');


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harddisks');
    }
};
