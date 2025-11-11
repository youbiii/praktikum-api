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
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_matakuliah');
            $table->integer('Semester');
            $table->integer('Jumlah_sks');
            $table->foreignId('prodi_id')
                ->constrained('prodi')
                ->onDelete('cascade');
            $table->foreignId('dosen_id')
                ->nullable()
                ->constrained('dosens')
                ->onDelete('set null');
            $table->timestamps(); // Membuat kolom created_at dan updated_at
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('matakuliah');
    }
};
