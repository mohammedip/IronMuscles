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
        Schema::table('entrainement_jours', function (Blueprint $table) {
            $table->foreignId('id_machine')->nullable()->constrained('machines')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entrainement_jours', function (Blueprint $table) {
            $table->dropForeign(['id_machine']);
            $table->dropColumn('id_machine');
        });
    }
};
