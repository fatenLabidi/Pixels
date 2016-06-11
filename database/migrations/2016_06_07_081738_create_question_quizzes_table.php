<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_quizzes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('description');
            $table->string('explication');
            $table->boolean('estValide')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
        
        // DB::statement("ALTER TABLE questionsQuiz comment 'Permet de stocker des questions liées aux quizzes'");
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
        Schema::drop('question_quizzes');
        Schema::enableForeignKeyConstraints();
    }
}
