<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoPlatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_plato', function (Blueprint $table) {

            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('plato_id');
            $table->primary(['pedido_id', 'plato_id']);

            $table->integer('cantidad')->nullable();

            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('plato_id')->references('id')->on('platos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_plato');
    }
}
