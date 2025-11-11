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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Mahasiswa');
            $table->string('NIM', 15)->unique();
            $table->string('Email')->unique();
            $table->foreignId('prodi_id')
                ->constrained('prodi')
                ->onDelete('cascade');

            // Relasi ke Dosen Pembimbing Akademik (PA)
            $table->foreignId('dosen_pa_id')
                ->nullable()
                ->constrained('dosens')
                ->onDelete('set null');

            // Kolom Informasi Kontak & Lainnya
            $table->string('No_HP', 15)->nullable();
            $table->text('Alamat')->nullable();
            $table->enum('Jenis_Kelamin', ['Laki-laki', 'Perempuan'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
