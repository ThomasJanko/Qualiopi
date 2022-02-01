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
            // $table->string('location_formation');
            $table->string('state_formation');
            $table->unsignedBigInteger('information_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('user_id')->nullable();
            // $table->unsignedBigInteger('date_id');
            $table->timestamps();
            $table->softDeletes();


            // $table->foreign('information_id')
            // ->references('id')->on('informations')
            // ->onDelete('cascade');
            // $table->timestamps();

            // $table->foreign('client_id')
            // ->references('id')->on('clients')
            // ->onDelete('cascade');
            // $table->timestamps();

            // $table->foreign('user_id')
            // ->references('id')->on('users')
            // ->onDelete('cascade');
            // $table->timestamps();

            // Schema::table('formations', function (Blueprint $table) {
            //         $table->softDeletes();
            // });
            // Schema::table('formations', function (Blueprint $table) {
            //     $table->dropSoftDeletes();
            // });
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
