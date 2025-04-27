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
        Schema::table('users', function (Blueprint $table) {
            $table->date('date_naissance')->nullable();
            $table->string('adresse')->nullable(); 
            $table->string('numero_telephone')->nullable(); 
            $table->timestamp('date_Inscription')->useCurrent();
            $table->enum('statut_abonnement', ['Actif','Expiré', 'Inactif'])->default('Inactif'); 
            $table->boolean('is_activate')->default(true);
            $table->foreignId('id_specialite')->nullable()->constrained('specialities')->onDelete('cascade');
            $table->date('date_recrutement')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            
        });
    }
};
