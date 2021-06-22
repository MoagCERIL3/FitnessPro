<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Exercices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NomExercice')->unique();
            $table->integer('Entrainement_id')->unsigned();
            $table->foreign('Entrainement_id')->references('id')->on('Entrainements');
            $table->integer('Temps')->unique();
            $table->rememberToken();
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
        //
         Schema::dropifExists("Exercices");
    }
}
