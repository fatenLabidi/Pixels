<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modifications', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->unsignedInteger('utilisateurId');
            $table->unsignedInteger('ficheId')->nullable();
            $table->unsignedInteger('newsId')->nullable();
            $table->timestamps();
            $table->softDeletes();            
            
            $table->foreign('ficheId')->references('id')->on('fiches')->onDelete('cascade');
            $table->foreign('newsId')->references('id')->on('news')->onDelete('cascade');            
            $table->foreign('utilisateurId')->references('id')->on('utilisateurs')->onDelete('cascade');
        });
        
        /*
        DB::statement("ALTER TABLE modifications comment 'Permet de stocker un utilisateur, une fiche OU une news"
                . " et une date afin de tracer qui fait quoi et à quel moment.'");
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
        Schema::drop('modifications');
        Schema::enableForeignKeyConstraints();
    }
}
