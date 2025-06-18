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
        Schema::create('tagihan_details', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tagihan_id')->constrained('tagihans')->onDelete('restrict'); // Foreign key referenc

            $table->string('namaItem');
            $table->string('jumlah');
            $table->string('hargaSatuan');
            $table->string('subtotal');


            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan_details');
    }
};
