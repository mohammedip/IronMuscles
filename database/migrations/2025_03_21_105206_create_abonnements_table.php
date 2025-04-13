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
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();
            $table->enum('type_Abonnement', ['Mensuel', 'Trimestriel', 'Semi-annuel', 'Annuel']);
            $table->date('date_Debut');
            $table->date('date_Fin');
            $table->decimal('prix', 8, 2);
            $table->foreignId('id_adherent')->constrained('adherents')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnements');
    }
};
