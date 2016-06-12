<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('nom')->index();
            $table->unsignedInteger('categorieId');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('categorieId')->references('id')->on('categories')->onDelete('cascade');
        });
        
        //DB::statement("ALTER TABLE themes comment 'Permet de stocker un thème appartenant à une catégorie.'");
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
        Schema::drop('themes');
        Schema::enableForeignKeyConstraints();
    }
}
