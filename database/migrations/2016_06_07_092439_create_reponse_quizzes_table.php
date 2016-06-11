<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReponseQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponse_quizzes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('description');
            $table->boolean('estBonneReponse')->default(false);
            $table->unsignedInteger('questionQuizId');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('questionQuizId')->references('id')->on('question_quizzes')->onDelete('cascade');
        });
        
        /*
        DB::statement("ALTER TABLE reponsesQuiz comment 'Permet de stocker "
                . "les réponses proposées dans les quizzes.'");
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
        Schema::drop('reponse_quizzes');
        Schema::enableForeignKeyConstraints();
        
    }
}
