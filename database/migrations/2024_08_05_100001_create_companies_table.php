<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Fichier : 2024_08_05_100001_create_companies_table.php
// Création de la table 'companies'. L'FK 'admin_id' sera ajoutée dans une migration séparée pour gérer les dépendances circulaires.
class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('logo_src')->nullable();
            $table->json('brand_colors')->nullable(); // Utilisation de JSON pour stocker les couleurs
            $table->json('white_label_config')->nullable(); // Utilisation de JSON pour la configuration
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
