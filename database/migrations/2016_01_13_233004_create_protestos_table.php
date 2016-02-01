<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protestos', function (Blueprint $table) {
            $table->increments('id');
            // Protesto
            $table->char('pro_periodo', 4);
            $table->char('pro_titulo', 4); // tabla de tablas letra, factura, pagaré, warrant...
            $table->string('pro_dcmto_numero', 30);
            $table->char('pro_moneda', 4); // tabla de tablas PEN, USD
            $table->double('pro_importe', 12, 3);
            $table->date('pro_fe_dcmto_emite');
            $table->date('pro_fe_dcmto_vence');
            $table->date('pro_fe_ingreso');
            $table->date('pro_fe_notificacion');
            $table->date('pro_fe_constancia');
            $table->string('pro_num_ingreso');
            $table->string('pro_num_acta');
            $table->string('pro_num_instrumento');
            $table->char('pro_clase', 4); // tabla de tablas ejem. con aval, sin aval
            $table->string('pro_modelo');
            $table->string('pro_lugar_giro');
            $table->char('pro_calificacion', 4); // tablas de tablas Protestado, Levantado

            // Solicitante se agrega aquí (Persona)
            $table->integer('pro_solicita_per_id')->unsigned();
            // Girador
            $table->integer('pro_girador_id')->unsigned();
            // Acepta
            $table->integer('pro_acepta_id')->unsigned();
            // Usuario
            $table->integer('pro_usuario_id')->unsigned();

            $table->tinyInteger('pro_estado')->default('1');

            $table->timestamps();

            $table->foreign('pro_usuario_id')->references('id')->on('users');
            $table->foreign('pro_solicita_per_id')->references('id')->on('persona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('protestos');
    }
}
