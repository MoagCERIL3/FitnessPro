<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUactivationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Uactivation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_utilisateur')->unsigned();
            $table->foreign('id_utilisateur')->references('id')->on('Utilisateurs')->onDelete('cascade');
            $table->string('token');
            $table->timestamp('created_at')->defautl(DB::raw('CURRENT_TIMESTAMP'));
        });

         Schema::table('Utilisateurs', function (Blueprint $table) {
            $table->boolean('is_activated')->default(0);

         });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Uactivation');
         Schema::table('Utilisateurs', function (Blueprint $table) {
            $table->dropColumn('is_activated');

         });
    
    }
}
