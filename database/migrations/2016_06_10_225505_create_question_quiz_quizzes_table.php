<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionQuizQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_quiz_quizzes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            // J'aimerais mettre les clés étrangères comme clé primaire, nommmée "id" mais ça ne fonctionne pas
            //$table->primary(['questionQuizzes_id', 'quiz_id'], 'id');
            $table->unsignedInteger('questionQuizzes_id');
            $table->unsignedInteger('quiz_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('questionQuizzes_id')->references('id')->on('question_quizzes')->onDelete('cascade');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
            
        });
        
        /*
        DB::statement("ALTER TABLE questionQuiz_Quiz comment 'Table intermédiaire "
                . "entre QuestionsQuizzes et Quizzes. Permet de stocker les clés "
                . "étrangères afin d\'attribuer des questions à des quizzes.'");
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
        Schema::drop('question_quiz_quizzes');
        Schema::enableForeignKeyConstraints();
        
    }
}
