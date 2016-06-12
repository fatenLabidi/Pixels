<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acces', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('groupeId');
            $table->unsignedInteger('serviceApplicatifId');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('groupeId')->references('id')->on('groupes')->onDelete('cascade');
            $table->foreign('serviceApplicatifId')->references('id')->on('servicesApplicatifs')->onDelete('cascade');
            $table->primary(['groupeId','serviceApplicatifId']);
        });
        
        /*
        DB::statement("ALTER TABLE acces comment 'Permet de sotcker les droits "
                . "d\'accès des groupes par rapport aux services applicatifs.'");
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
        Schema::drop('acces');
        Schema::enableForeignKeyConstraints();
    }
}
