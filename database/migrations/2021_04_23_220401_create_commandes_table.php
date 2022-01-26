<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_commande');
            $table->integer('num_commande');
            $table->string('email');
            $table->double('prix_commande');
            $table->string('description_commande');
            $table->integer('amount');
            $table->text('products');
            $table->integer('panier_id')->unsigned();
            $table->timestamps();
            $table->foreign('panier_id')->references('id')->on('paniers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
