<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planformations', function (Blueprint $table) {
            $table->id();
            $table->string('name_formation');
            $table->string('time_formation');
            $table->unsignedBigInteger('formation_id');
            $table->unsignedBigInteger('user_id');


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
        Schema::dropIfExists('planformations');
    }
}
