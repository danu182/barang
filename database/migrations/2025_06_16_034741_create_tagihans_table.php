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
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('vendor_id')->constrained('vendors')->onDelete('cascade'); // Foreign key referenc
            $table->foreignId('pelanggan_id')->constrained('pelanggans')->onDelete('cascade'); // Foreign key referenc

            $table->string('noTagihan');
            $table->string('upTagihan');
            $table->date('tanggalTagihan');
            $table->date('dueDateTagihan');
            $table->string('periodeTagihan')->nullable();
            $table->string('totaltagihan');
            $table->bigInteger('statusTagihan_id');

            // $table->foreignId('statusTagihan_id')->constrained('status_tagihans')->onDelete('cascade')->default(1);
            $table->string('lampiran');
            $table->text('keterangan')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};
