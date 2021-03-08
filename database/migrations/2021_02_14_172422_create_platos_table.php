<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->longText('descripcion');

            $table->string('precio');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('restaurante_id');

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('restaurante_id')->references('id')->on('restaurantes')->onDelete('cascade');

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
        Schema::dropIfExists('platos');
    }
}
