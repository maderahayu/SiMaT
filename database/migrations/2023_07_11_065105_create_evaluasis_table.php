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
        Schema::create('tblEvaluasi', function (Blueprint $table) {
            $table->id('evaluasiId');
            $table->string('penilaian');
            $table->string('komentar');
            $table->date('tglEvaluasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblEvaluasi');
    }
};
