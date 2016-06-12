<?php

//

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateursTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('pseudo')->unique();
            $table->date('motDePasse');
            $table->date('anneeNaissance');
            $table->string('sexe');
            $table->string('email');
            $table->string('reponseQuestionSecrete');
            $table->unsignedInteger('paysId');
            $table->unsignedInteger('regionId');
            $table->unsignedInteger('questionSecreteId');
            $table->timestamps();

            $table->foreign('paysId')->references('id')->on('pays')->onDelete('cascade');
            $table->foreign('regionId')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('questionSecreteId')->references('id')->on('questionsSecretes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('utilisateurs');
    }

}
