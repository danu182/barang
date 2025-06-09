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
        Schema::create('sosmed_details', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sosmed_id')->constrained('sosmeds')->onDelete('restrict'); // Foreign key referenc

            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('link');
            $table->string('pemilik');
            $table->string('pic');
            $table->string('bagian');
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
        Schema::dropIfExists('sosmed_details');
    }
};
