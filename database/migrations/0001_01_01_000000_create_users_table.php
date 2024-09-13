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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('nama');
            $table->string('nip')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('status')->nullable();
            $table->string('foto')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                // THE ADMINs[
                [
                    'role' => 'superadmin',
                    'nama' => 'SUPERADMIN',
                    'nip' => '15243',
                    'jabatan' => null,
                    'nomor_hp' => null,
                    'status' => null,
                    'email' => null,
                    'password' => bcrypt('12345'),
                    'foto' => null,
                ],
                [
                    'role' => 'admin',
                    'nama' => 'ADMIN BIDANG ANGGARAN',
                    'nip' => '15243',
                    'jabatan' => null,
                    'nomor_hp' => null,
                    'status' => null,
                    'email' => null,
                    'password' => bcrypt('12345'),
                    'foto' => null,
                ],
                [
                    'role' => 'admin',
                    'nama' => 'ADMIN BIDANG AKUNTANSI',
                    'nip' => '15243',
                    'jabatan' => null,
                    'nomor_hp' => null,
                    'status' => null,
                    'email' => null,
                    'password' => bcrypt('12345'),
                    'foto' => null,
                ],
                [
                    'role' => 'admin',
                    'nama' => 'ADMIN PERBENDAHARAAN DAN KAS DAERAH',
                    'nip' => '15243',
                    'jabatan' => null,
                    'nomor_hp' => null,
                    'status' => null,
                    'email' => null,
                    'password' => bcrypt('12345'),
                    'foto' => null,
                ],
                [
                    'role' => 'admin',
                    'nama' => 'ADMIN ASET DAERAH',
                    'nip' => '15243',
                    'jabatan' => null,
                    'nomor_hp' => null,
                    'status' => null,
                    'email' => null,
                    'password' => bcrypt('12345'),
                    'foto' => null,
                ],
                // THE USERS
                [
                    'role' => 'pejabat',
                    'nama' => 'Drs. H. ASEP GOPARULLAH, M.Pd',
                    'nip' => '19700215 198903 1 004',
                    'jabatan' => 'kepala badan',
                    'nomor_hp' => null,
                    'status' => 'aktif',
                    'email' => null,
                    'password' => bcrypt('12345'),
                    'foto' => null,
                ],
                [
                    'role' => 'pejabat',
                    'nama' => 'Hj. HESTI WIDIAWATI, SE, M.M',
                    'nip' => '19770725 200312 2 010',
                    'jabatan' => 'Sekretaris Badan',
                    'nomor_hp' => null,
                    'status' => 'aktif',
                    'email' => null,
                    'password' => bcrypt('12345'),
                    'foto' => null,
                ],
                [
                    'role' => 'pejabat',
                    'nama' => 'Hj. DESI NUR ARIA SARI, S.STP, M.Si',
                    'nip' => '19781206 199711 2 001',
                    'jabatan' => 'Kabid Anggaran',
                    'nomor_hp' => null,
                    'status' => 'aktif',
                    'email' => null,
                    'password' => bcrypt('12345'),
                    'foto' => null,
                ],
                [
                    'role' => 'pejabat',
                    'nama' => 'Hj. YENI MULYANI, SE, M.M',
                    'nip' => '19670906 199203 2 008',
                    'jabatan' => 'Kabid Aset Daerah',
                    'nomor_hp' => null,
                    'status' => 'aktif',
                    'email' => null,
                    'password' => bcrypt('12345'),
                    'foto' => null,
                ],
                [
                    'role' => 'pejabat',
                    'nama' => 'ENDANG MAHBUB AHMAD',
                    'nip' => '19660606 198603 1 012',
                    'jabatan' => 'Kabid Akuntansi',
                    'nomor_hp' => null,
                    'status' => 'aktif',
                    'email' => null,
                    'password' => bcrypt('12345'),
                    'foto' => null,
                ],
                [
                    'role' => 'pejabat',
                    'nama' => 'SUSY SUSILAWATY, S.Sos, M.Kes',
                    'nip' => '19700409 199307 2 001',
                    'jabatan' => 'Kasubag Tata Usaha',
                    'nomor_hp' => null,
                    'status' => 'tidak aktif',
                    'email' => null,
                    'password' => bcrypt('12345'),
                    'foto' => null,
                ],
                [
                    'role' => 'staf',
                    'nama' => 'YANI KAMILA, S.Sos, M.Si',
                    'nip' => '19750325 200604 2 030',
                    'jabatan' => 'Analis Kepegawaian Ahli Muda',
                    'nomor_hp' => null,
                    'status' => 'aktif',
                    'email' => null,
                    'password' => bcrypt('12345'),
                    'foto' => null,
                ],
                [
                    'role' => 'pejabat',
                    'nama' => 'YANI SULAEMAN AGUSTIN, S.Sos, M.Si',
                    'nip' => '19750723 200701 1 003',
                    'jabatan' => 'Kasubid Penatausahaan Aset Daerah',
                    'nomor_hp' => null,
                    'status' => 'aktif',
                    'email' => null,
                    'password' => bcrypt('12345'),
                    'foto' => null,
                ],
            )
            );

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
