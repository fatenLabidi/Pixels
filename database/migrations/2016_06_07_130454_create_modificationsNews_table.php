<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModificationsNewsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('modificationsNews', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('newsId');
            $table->unsignedInteger('modificationId');
            $table->timestamps();

            $table->foreign('newsId')->references('id')->on('news')->onDelete('cascade');
            $table->foreign('modificationId')->references('id')->on('modifications')->onDelete('cascade');
            $table->primary(['modificationId', 'newsId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('modificationsNews');
    }

}
