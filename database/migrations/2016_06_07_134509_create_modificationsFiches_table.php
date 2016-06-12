<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModificationsFichesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('modificationsFiches', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('fichesId');
            $table->unsignedInteger('modificationId');
            $table->timestamps();

            $table->foreign('fichesId')->references('id')->on('fiches')->onDelete('cascade');
            $table->foreign('modificationId')->references('id')->on('modifications')->onDelete('cascade');
            $table->primary(['modificationId', 'fichesId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('modificationsFiches');
    }

}
