<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /** * Run the migrations. */ public function up(): void
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Dosen');
            $table->string('NIDN', 20)->unique();
            $table->string('Email')->unique();
            $table->string('No_HP', 15)->nullable();
            $table->text('Alamat')->nullable();
            $table->string('Gelar')->nullable();
            $table->foreignId('jabatan_id')->nullable()->constrained('jabatans')->onDelete('set null');
            $table->timestamps();
        });
    }
    /** * Reverse the migrations. */ public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
