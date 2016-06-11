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
            $table->softDeletes();

            $table->foreign('groupeId')->references('id')->on('groupes')->onDelete('cascade');
            $table->foreign('utilisateurId')->references('id')->on('utilisateurs')->onDelete('cascade');
        });
        
        /*
        DB::statement("ALTER TABLE utilisateursGroupes comment 'Permet d\'assigner "
                . "des utilisateurs à des groupes.'");
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
        Schema::drop('utilisateursGroupes');
        Schema::enableForeignKeyConstraints();
    }

}
