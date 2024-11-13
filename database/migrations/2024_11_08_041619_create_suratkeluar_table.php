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
        Schema::create('suratkeluar', function (Blueprint $table) {
            $table->id();  
            $table->string('perihal');
            $table->string('pemohon');
            $table->string('penandatangan');
            $table->string('no_surat');
            $table->string('tembusan');
            $table->string('penerimasurat');
            $table->string('isi');
            $table->string('sifat');
            $table->string('dokumen')->nullable();
            $table->string('status_dibaca')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratkeluar');
    }
};
