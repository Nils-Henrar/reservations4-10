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

            // Ajouter les nouvelles colonnes avant de modifier les colonnes existantes
            $table->string('lastname', 60)->after('name');
            $table->string('login', 30)->after('id');
            $table->string('langue', 2)->after('email');

            // Modifier la colonne name en string de 60 caractères
            $table->string('name', 60)->change();

            // Renommer la colonne name en firstname
            $table->renameColumn('name', 'firstname');

            // Définir la contrainte d'unicité sur la colonne login
            $table->unique('login', 'users_login_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_login_unique');
            $table->renameColumn('firstname', 'name');
            $table->string('name', 255)->change();
            $table->dropColumn('langue');
            $table->dropColumn('login');
            $table->dropColumn('lastname');
        });
    }
};
