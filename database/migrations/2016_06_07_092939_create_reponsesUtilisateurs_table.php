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
            
            $table->foreign('utilisateurId')->references('id')->on('utilisateurs')->onDelete('cascade');
            $table->foreign('quizId')->references('id')->on('quiz')->onDelete('cascade');
            $table->foreign('reponseQuizId')->references('id')->on('reponsesQuiz')->onDelete('cascade');
            $table->primary(['utilisateurId','quizId','reponseQuizId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reponsesUtilisateurs');
    }
}
