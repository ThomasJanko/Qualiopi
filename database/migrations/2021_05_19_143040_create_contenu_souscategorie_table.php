<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenuSouscategorieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenu_souscategorie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contenu_id');
            $table->unsignedBigInteger('souscategorie_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenu_souscategorie');
    }
}
