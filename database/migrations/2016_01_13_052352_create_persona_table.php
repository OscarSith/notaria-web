<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('id');
            // Natural
            $table->char('per_tipo', 4); // JUridico o natural
            $table->char('per_nacion', 4)->nullable();
            $table->char('per_dcmto_tipo', 4)->nullable();
            $table->char('per_sexo', 4)->nullable();
            $table->string('per_dcmto_numero', 40)->nullable();
            $table->string('per_ruc', 40)->nullable();
            $table->string('per_ape_paterno', 120)->nullable();
            $table->string('per_ape_materno', 120)->nullable();
            $table->string('per_nombre1', 120)->nullable();
            $table->string('per_nombre2', 120)->nullable();
            $table->date('per_fe_naci');

            $table->string('per_razon_social')->nullable();
            $table->string('per_direccion')->nullable();
            $table->string('per_direc_referencia')->nullable();
            $table->string('per_alfabetico'); // pref juridico jur_ o  natural nar_

            $table->integer('per_crea_user')->unsigned();
            $table->integer('per_act_user')->unsigned(); // Quien lo actualizo
            $table->integer('per_ubg_id')->unsigned();

            $table->tinyInteger('per_estado')->default('1');
            $table->timestamps();

            $table->foreign('per_crea_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('persona');
    }
}
