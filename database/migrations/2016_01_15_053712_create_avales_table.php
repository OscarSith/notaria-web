<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avales', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('ava_seq'); // secuencia de avales dentro de un protesto, 1, 2, 3...
            $table->integer('ava_protesto_id')->unsigned();
            $table->char('ava_tipo_persona', 4);
            $table->char('ava_per_tipo_documento', 4);
            $table->string('ava_tipo_documento_numero', 60);
            $table->string('ava_nombre_razon');
            $table->string('ava_direccion');
            $table->string('firma');

            $table->string('ava_per_direc_departamento');
            $table->string('ava_per_direc_provincia');
            $table->string('ava_per_direc_distrito');

            $table->integer('ava_per_id')->unsigned();
            $table->integer('ava_ubigeo')->unsigned();

            $table->tinyInteger('ava_estado')->default('1');
            $table->timestamps();

            $table->foreign('ava_protesto_id')->references('id')->on('protestos');
            $table->foreign('ava_per_id')->references('id')->on('persona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('avales');
    }
}
