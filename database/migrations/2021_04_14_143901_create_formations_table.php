<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('name_formation');
            $table->string('location_formation');
            $table->string('state_formation');
            $table->unsignedBigInteger('information_id');
            $table->unsignedBigInteger('planformation_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('date_id');
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
        Schema::dropIfExists('formations');
    }
}
