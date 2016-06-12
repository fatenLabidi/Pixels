<?php

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
            $table->string('motDePasse');
            $table->bigInteger('anneeNaissance')->nullable();
            $table->string('sexe')->nullable();
            $table->string('email')->nullable();
            $table->string('reponseQuestionSecrete')->nullable();
            $table->unsignedInteger('paysId');
            $table->unsignedInteger('regionId')->nullable();
            $table->unsignedInteger('questionSecreteId')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('paysId')->references('id')->on('pays')->onDelete('cascade');
            $table->foreign('regionId')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('questionSecreteId')->references('id')->on('questionsSecretes')->onDelete('cascade');
        });
        
        // DB::statement("ALTER TABLE utilisateurs comment 'Permet de stocker un utilisateur.'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        // Enlève temporairement le check des contraintes de clés étrangères
        Schema::disableForeignKeyConstraints();
        Schema::drop('utilisateurs');
        Schema::enableForeignKeyConstraints();
    }

}
