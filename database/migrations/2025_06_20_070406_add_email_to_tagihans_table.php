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
        Schema::table('tagihans', function (Blueprint $table) {

            $table->string('picUser')->nullable()->after('totaltagihan');
            $table->string('picAlamat')->nullable()->after('picUser');
            $table->string('picTlp')->nullable()->after('picAlamat');
            $table->string('picEmail')->nullable()->after('picTlp');
            // $table->string('statusTagihan')->nullable()->default('1')->after('picEmail');
            // $table->foreignId('statusTagihan_id')->constrained('status_tagihans')->onDelete('cascade')->default('1')->after('picEmail'); // Foreign key referenc

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tagihans', function (Blueprint $table) {

            $table->dropColumn('picUser');
            $table->dropColumn('picAlamat');
            $table->dropColumn('picTlp');
            $table->dropColumn('picEmail');
            // $table->dropColumn('statusTagihan_id');
        });
    }
};
