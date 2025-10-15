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
        // Pastikan nama tabel sama dengan yang digunakan di Model ('prodi')
        Schema::create('prodi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_prodi', 255);
            $table->string('kode_prodi', 10)->unique();

            // Contoh Foreign Key ke tabel 'fakultas'
            // Pastikan tabel 'fakultas' dibuat sebelum tabel 'prodi'
            $table->foreignId('fakultas_id')->constrained('fakultas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi');
    }
};
