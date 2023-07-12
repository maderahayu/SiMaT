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
        Schema::create('tblPemagang', function (Blueprint $table) {
            $table->id('pemagangId');
            $table->integer('userId');
            $table->string('email');
            $table->string('namaPemagang');
            $table->string('namaUniversitas');
            $table->string('fotoProfil');
            $table->date('tglMulai')->nullable();
            $table->date('tglSelesai')->nullable();
            $table->string('noTelp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblPemagang');
    }
};
