<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('nom');
            $table->string('conseil');
            $table->unsignedInteger('auteur');
            $table->unsignedInteger('categorieId');
            $table->boolean('estValide')->default(false);
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('auteur')->references('id')->on('utilisateurs')->onDelete('cascade');
            $table->foreign('categorieId')->references('id')->on('categories')->onDelete('cascade');
        });
        
        // DB::statement("ALTER TABLE quizzes comment 'Permet de stocker des quizzes'");
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
        Schema::drop('quizzes');
        Schema::enableForeignKeyConstraints();
    }
}
