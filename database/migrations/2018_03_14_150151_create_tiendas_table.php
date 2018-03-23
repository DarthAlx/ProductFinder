<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->longText('url');
            $table->longText('urlbusqueda');
            $table->string('selectenlace');
            $table->string('selectitem');
            $table->string('selectnombre');
            $table->string('selectimagen');
            $table->string('attrimagen');
            $table->string('selectprecio');
            $table->string('selectprecio_especial')->nullable();
            $table->string('selectvaloracion');
            $table->bigInteger('clicks')->default(0);
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
        Schema::dropIfExists('tiendas');
    }
}
