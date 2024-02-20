// database/migrations/[timestamp]_create_plantes_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePlantesTable extends Migration
{
    public function up()
    {
        Schema::create('plantes', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 50);
            $table->string('image', 100);
            $table->string('description', 500);
            $table->string('conseil_entretien', 500);
            $table->unsignedBigInteger('id_session_de_garde');
            // Ajoute d'autres colonnes si nécessaire

            $table->timestamps();
        });

        // Ajoute une clé étrangère dans la table des sessions de garde
        Schema::table('plantes', function (Blueprint $table) {
            $table->foreign('id_session_de_garde')->references('id')->on('sessions_de_garde')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('plantes');
    }
}
