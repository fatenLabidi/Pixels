<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('news', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('titre');
            $table->string('contenu');
            $table->boolean('estValide');
            $table->unsignedInteger('categorieId');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('categorieId')->references('id')->on('categories')->onDelete('cascade');
        });

        // DB::statement("ALTER TABLE news comment 'Permet de stocker des News'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        // Enlève temporairement le check des contraintes de clés étrangères
        Schema::disableForeignKeyConstraints();
        Schema::drop('news');
        Schema::enableForeignKeyConstraints();
    }

}
