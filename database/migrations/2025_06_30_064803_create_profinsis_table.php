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
        Schema::create('profinsis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('negara_id')->constrained('negaras')->onDelete('restrict'); // Foreign key reference

            $table->string('namaProfinsi');
            $table->text('keteranganProfinsi')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profinsis');
    }
};
