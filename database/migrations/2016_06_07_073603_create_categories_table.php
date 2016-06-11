<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('nom')->index();
            $table->timestamps();
            $table->softDeletes();
        });

        // DB::statement("ALTER TABLE categories comment 'Permet de stocker des catégories'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        // Enlève temporairement le check des contraintes de clés étrangères
        Schema::disableForeignKeyConstraints();
        Schema::drop('categories');
        Schema::enableForeignKeyConstraints();
    }

}
