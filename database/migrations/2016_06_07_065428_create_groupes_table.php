<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('nom')->index();
            $table->timestamps();
            $table->softDeletes();
        });
        
        /*
        DB::statement("ALTER TABLE groupes comment 'Permet de grouper les "
                . "utilisateurs, notamment pour les droits d\'accès.'");
         * 
         */
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
        Schema::drop('groupes');
        Schema::enableForeignKeyConstraints();
    }
}
