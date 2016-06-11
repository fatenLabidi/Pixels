<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('titre');
            $table->string('contenu');
            $table->boolean('estValide');
            $table->unsignedInteger('themeId');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('themeId')->references('id')->on('themes')->onDelete('cascade');
            
        });
        
        // DB::statement("ALTER TABLE fiches comment 'Permet de stocker une fiche appartenant à un thème.'");
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
        Schema::drop('fiches');
        Schema::enableForeignKeyConstraints();
    }
}
