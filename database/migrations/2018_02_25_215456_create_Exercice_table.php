<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Exercice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NomExercice')->unique();
            $table->integer('Entrainement_id')->unsigned();
            $table->foreign('Entrainement_id')->references('id')->on('Entrainement');
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
        Schema::dropifExists("Exercice");
    }
}
