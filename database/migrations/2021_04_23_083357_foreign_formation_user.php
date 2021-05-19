<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignFormationUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formation_user', function (Blueprint $table) {

            $table->foreign('formation_id')->references('id')->on('formations');
            $table->foreign('user_id')->references('id')->on('users');


        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formation_user', function (Blueprint $table) {

            $table->dropForeign('formation_user_formation_id_foreign');
            $table->dropForeign('formation_user_user_id_foreign');


        });

    }
}
