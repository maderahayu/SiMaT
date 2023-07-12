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
        Schema::create('tblTugas', function (Blueprint $table) {
            $table->id('tugasId');
            $table->string('judul');
            $table->string('deskripsi');
            $table->enum('status', ['Baru','Proses','Evaluasi','Revisi', 'Selesai'])->default('Baru');
            $table->date('tglMulai');
            $table->date('tglSelesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblTugas');
    }
};
