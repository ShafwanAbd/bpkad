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
        Schema::create('suratmasuk', function (Blueprint $table) {
            $table->id();
            $table->string('perihal');
            $table->string('no_surat'); 
            $table->string('informasi_ringkas');   
            $table->string('pengirim');
            $table->string('dokumen')->nullable();
            $table->string('status_diteruskan');
            $table->string('status_disposisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratmasuk');
    }
};
