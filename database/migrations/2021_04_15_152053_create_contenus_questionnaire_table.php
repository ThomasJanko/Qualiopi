<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenuQuestionnaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenuQuestionnaires', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('questionnaire_id');
            $table->unsignedbigInteger('contenu_formation_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenu_questionnaire');
    }
}
