<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignLigneplanformationListformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ligneplanformation_listformation', function (Blueprint $table) {

            $table->foreign('ligneplanformation_id')->references('id')->on('ligneplanformations');
            $table->foreign('listformation_id')->references('id')->on('listformations');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()

    {
        Schema::table('ligneplanformation_listformation', function (Blueprint $table) {

            $table->dropForeign('ligneplanformation_listformation_ligneplanformation_id_foreign');
            $table->dropForeign('ligneplanformation_listformation_listformation_id_foreign');

        });

    }
}
