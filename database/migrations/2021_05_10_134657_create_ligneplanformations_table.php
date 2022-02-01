<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneplanformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligneplanformations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('planformation_id');
            $table->String('Categorie');
            $table->String('SousCategorie');
            $table->String('Contenu');
            $table->unsignedBigInteger('questionnaire_id');
            $table->unsignedBigInteger('listformation_id');

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
        Schema::dropIfExists('ligneplanformations');
    }
}
