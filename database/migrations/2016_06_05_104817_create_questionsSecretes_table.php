<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsSecretesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('questionsSecretes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });
        
        /* Les commentaires fonctionnent avec mysql mais pas pgsql ... */
        
        //DB::statement("COMMENT ON TABLE questionsSecretes IS 'Permet de créer des questions secrètes, pour la récupération du mot de passe utilisateur.'");        
        //DB::statement("ALTER TABLE questionsSecretes comment 'Permet de créer des "
        //        . "questions secrètes, pour la récupération du mot de passe utilisateur.'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
        // Enlève temporairement le check des contraintes de clés étrangères
        Schema::disableForeignKeyConstraints();
        Schema::drop('questionsSecretes');
        Schema::enableForeignKeyConstraints();
        
    }

}
