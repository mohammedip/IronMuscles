<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('adherents', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->date('date_naissance');
            $table->string('adresse'); 
            $table->string('numero_telephone'); 
            $table->string('email')->unique(); 
            $table->timestamp('date_Inscription')->useCurrent();
            $table->enum('statut_abonnement', ['Actif','Expiré', 'InaEctif'])->default('Inactif'); 
            $table->boolean('is_activate')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adherents');
    }
};
