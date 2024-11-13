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
        Schema::create('disposisi', function (Blueprint $table) {
            $table->id();
            $table->string('tujuan');
            $table->string('catatan');
            $table->string('perintah');
            $table->string('sifat');
            $table->string('pembuat'); 
            $table->string('id_surat'); 
            $table->string('status'); 
            $table->string('status_dibaca')->default('0');
            $table->string('disposisi_lanjut')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposisi');
    }
};
