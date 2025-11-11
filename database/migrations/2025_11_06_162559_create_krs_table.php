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
        // Tabel ini akan mencatat setiap matakuliah yang diambil oleh mahasiswa
        Schema::create('krs', function (Blueprint $table) {
            $table->id();

            // Foreign key ke tabel mahasiswas
            $table->foreignId('mahasiswa_id')
                ->constrained('mahasiswas')
                ->onDelete('cascade');

            // Foreign key ke tabel matakuliah
            $table->foreignId('matakuliah_id')
                ->constrained('matakuliah')
                ->onDelete('cascade');

            // ---- TAMBAHAN: Foreign key ke Dosen PA (Persetujuan) ----
            $table->foreignId('dosen_pa_id')
                ->nullable()
                ->onDelete('set null');

            // Informasi tambahan untuk KRS
            $table->string('tahun_akademik');
            $table->string('semester_diambil');

            $table->string('status')->default('Pending');
            $table->string('nilai')->nullable();

            $table->timestamps();

            $table->unique(
                ['mahasiswa_id', 'matakuliah_id', 'tahun_akademik', 'semester_diambil'],
                'krs_unique_index'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('krs');
    }
};
