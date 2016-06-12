<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReponsesUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponsesUtilisateurs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('utilisateurId');
            $table->unsignedInteger('quizId');
            $table->unsignedInteger('reponseQuizId');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('utilisateurId')->references('id')->on('utilisateurs')->onDelete('cascade');
            $table->foreign('quizId')->references('id')->on('quizzes')->onDelete('cascade');
            $table->foreign('reponseQuizId')->references('id')->on('reponse_quizzes')->onDelete('cascade');
            $table->primary(['utilisateurId','quizId','reponseQuizId']);
        });
        
        /*
        DB::statement("ALTER TABLE reponsesUtilisateurs comment 'Permet de stocker "
                . "la réponse à la question secrète de chaque utilisateur, "
                . "s\'il décide d\'en remplir une.'");
         * 
         */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Enlève temporairement le check des contraintes de clés étrangères
        Schema::disableForeignKeyConstraints();
        Schema::drop('reponsesUtilisateurs');
        Schema::enableForeignKeyConstraints();
    }
}
