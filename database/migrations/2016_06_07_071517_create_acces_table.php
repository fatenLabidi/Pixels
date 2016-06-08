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
            
            $table->foreign('groupeId')->references('id')->on('groupes')->onDelete('cascade');
            $table->foreign('serviceApplicatifId')->references('id')->on('servicesApplicatifs')->onDelete('cascade');
            $table->primary(['groupeId','serviceApplicatifId']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('acces');
    }
}
