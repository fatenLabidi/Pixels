<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesNewsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('categoriesNews', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('categorieId');
            $table->unsignedInteger('newsId');

            $table->foreign('categorieId')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('newsId')->references('id')->on('news')->onDelete('cascade');
            $table->primary(['categorieId', 'newsId']);
            $table->timestamps();
            $table->softDeletes();
        });
        
        /*
        DB::statement("ALTER TABLE categoriesNews comment 'Permet de stocker "
                . "quelles News appartiennent à quelles catégories'");
         * 
         */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        // Enlève temporairement le check des contraintes de clés étrangères
        Schema::disableForeignKeyConstraints();
        Schema::drop('categoriesNews');
        Schema::enableForeignKeyConstraints();
    }

}
