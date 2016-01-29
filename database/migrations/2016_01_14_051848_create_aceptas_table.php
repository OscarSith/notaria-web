<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAceptasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acepta', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('acp_seq');
            $table->char('acp_per_dcmto_tipo', 4);
            $table->char('acp_tipo_persona', 4);
            $table->string('acp_per_dcmto_numero', 60);
            $table->string('acp_nombre_razon');
            $table->string('acp_per_direccion');
            $table->string('acp_firma');

            $table->string('act_per_direc_departamento');
            $table->string('act_per_direc_provincia');
            $table->string('act_per_direc_distrito');

            $table->integer('acp_ubg_id')->unsigned();
            $table->integer('act_per_id')->unsigned();

            $table->tinyInteger('act_estado')->default('1');
            $table->timestamps();

            $table->foreign('act_per_id')->references('id')->on('persona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('acepta');
    }
}
