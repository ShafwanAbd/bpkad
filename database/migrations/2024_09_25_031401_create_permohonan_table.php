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
            $table->string('nota_pengantar');
            $table->string('verifikator1');
            $table->string('verifikator2');
            $table->string('verifikator3');
            $table->string('verifikator4');
            $table->string('penandatangan');
            $table->string('tembusan');
            $table->string('pemohon');
            $table->string('dokumen');
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
