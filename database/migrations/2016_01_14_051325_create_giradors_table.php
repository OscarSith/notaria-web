<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('girador', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('gir_seq');
            $table->char('gir_tipo_persona', 4);
            $table->char('gir_per_dcmto_tipo', 4);
            $table->string('gir_per_dcmto_numero', 60);
            $table->string('gir_nombre_razon');
            $table->string('gir_per_direccion');
            $table->string('gir_firma');

            $table->string('gir_per_direc_departamento');
            $table->string('gir_per_direc_provincia');
            $table->string('gir_per_direc_distrito');

            $table->integer('gir_ubg_id')->unsigned();
            $table->integer('grd_per_id')->unsigned();

            $table->tinyInteger('gir_estado')->default('1');
            $table->timestamps();

            $table->foreign('grd_per_id')->references('id')->on('persona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('girador');
    }
}
