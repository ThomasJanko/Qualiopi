<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListformationSouscategorieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listformation_souscategorie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listformation_id');
            $table->unsignedBigInteger('souscategorie_id');
            // $table->unsignedBigInteger('contenu_id');
            // $table->integer('groupe');
            // $table->integer('duree');

        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listformation_souscategorie');
    }
}
