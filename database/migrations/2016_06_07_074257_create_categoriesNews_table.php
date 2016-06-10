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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('categoriesNews');
    }

}
