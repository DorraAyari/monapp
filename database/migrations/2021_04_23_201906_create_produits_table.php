<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('produits_nom');
            $table->string('produits_description');
            $table->double('price');
       
            $table->integer('catalogue_id')->unsigned();
            $table->string('pics');
            $table->string('email');
            $table->timestamps();
            $table->foreign('catalogue_id')->references('id')->on('catalogues')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
