<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('social_reason');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('postal');
            $table->string('country');
            $table->timestamps();

            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('client'); //format de base

        Schema::dropIfExists('client', function (Blueprint $table) {

            $table->dropColumn('deleted_at'); //permet d'annuler la migraton // effectuer un roll back

        });
    }
}
