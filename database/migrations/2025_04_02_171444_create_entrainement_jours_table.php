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
        Schema::create('entrainement_jours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_entrainement')->constrained('entrainements')->onDelete('cascade');
            $table->integer('jour_numero');
            $table->string('exercices');
            $table->string('heure');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrainement_jours');
    }
};
