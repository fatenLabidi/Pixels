<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nom');
            $table->unsignedInteger('paysId');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('paysId')->references('id')->on('pays')->onDelete('cascade');
        });
        
        // DB::statement("ALTER TABLE regions comment 'Permet d\'attribuer des régions à chaque pays.'");
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
        Schema::drop('regions');
        Schema::enableForeignKeyConstraints();
    }
}
