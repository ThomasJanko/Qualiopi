<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenuquestionnaireQuestionnaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenuquestionnaire_questionnaire', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('contenuquestionnaire_id');
            $table->unsignedBigInteger('questionnaire_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenuquestionnaire_questionnaire');
    }
}
