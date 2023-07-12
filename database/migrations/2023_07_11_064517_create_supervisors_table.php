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
        Schema::create('tblSupervisor', function (Blueprint $table) {
            $table->id('supervisorId');
            $table->string('namaSupervisor');
            $table->string('fotoProfil')->nullable();
            $table->string('noTelp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblSupervisor');
    }
};
