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
        Schema::create('entrainements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_adherent')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_coach')->constrained('users')->onDelete('cascade');
            $table->date('date_debut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrainements');
    }
};
