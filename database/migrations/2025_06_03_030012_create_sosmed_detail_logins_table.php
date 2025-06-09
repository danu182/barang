<?php

use App\Models\SosmedDetail;
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
        Schema::create('sosmed_detail_logins', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sosmedDetail_id')->constrained('sosmed_details')->onDelete('restrict'); // Foreign key referenc

            $table->date('tanggal');
            $table->time('jam');
            $table->integer('status');
            $table->text('gambar');
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
        Schema::dropIfExists('sosmed_detail_logins');
    }
};
