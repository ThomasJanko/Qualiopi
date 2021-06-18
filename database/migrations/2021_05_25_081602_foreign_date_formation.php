<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignDateFormation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('date_formation', function (Blueprint $table) {

            $table->foreign('date_id')->references('id')->on('dates');
            $table->foreign('formation_id')->references('id')->on('formations');


        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('date_formation', function (Blueprint $table) {

            $table->dropForeign('date_formation_date_id_foreign');
            $table->dropForeign('date_formation_formation_id_foreign');


        });

    }
}
