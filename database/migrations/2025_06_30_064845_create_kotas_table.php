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
        Schema::create('kotas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('profinsi_id')->constrained('profinsis')->onDelete('cascade'); // Foreign key reference
            // $table->foreign('profinsi_id')->references('id')->on('profinsis')->onDelete('cascade');

            $table->string('namaKota')->nullable();
            $table->text('keteranganKota');


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kotas');
    }
};
