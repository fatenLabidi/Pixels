<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateursGroupesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('utilisateursGroupes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('groupeId');
            $table->unsignedInteger('utilisateurId');
            $table->timestamps();

            $table->foreign('groupeId')->references('id')->on('groupes')->onDelete('cascade');
            $table->foreign('utilisateurId')->references('id')->on('utilisateurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('utilisateursGroupes');
    }

}
