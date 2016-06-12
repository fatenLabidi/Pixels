<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesApplicatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicesApplicatifs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('nom')->index();
            $table->timestamps();
            $table->softDeletes();
        });
        
        // DB::statement("ALTER TABLE servicesApplicatifs comment 'Permet de lister les différents services applicatifs'");
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
        Schema::drop('servicesApplicatifs');
        Schema::enableForeignKeyConstraints();
    }
}
