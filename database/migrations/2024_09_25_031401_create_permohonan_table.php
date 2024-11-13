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
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id();
            $table->string('perihal');
            $table->string('no_surat');
            $table->string('sifat');
            $table->string('nota_pengantar')->nullable();
            $table->string('verifikator1')->nullable();
            $table->string('verifikator2')->nullable();
            $table->string('verifikator3')->nullable();
            $table->string('verifikator4')->nullable();
            $table->string('penandatangan');
            $table->string('pengkoreksi')->nullable();
            $table->string('status_koreksi')->nullable();
            $table->string('pesan_koreksi')->nullable();
            $table->string('pemohon');
            $table->string('dokumen')->nullable();
            $table->string('status_dibaca')->default('0');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan');
    }
};
