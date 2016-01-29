<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestro_tabla', function (Blueprint $table) {
            $table->increments('id');
            $table->char('ttb_tipo', 4);
            $table->char('ttb_arg', 4);
            $table->string('ttb_val1', 120);
            $table->string('ttb_val2', 120);
            $table->string('ttb_val3', 120);
            $table->string('ttb_val4', 120);
            $table->string('ttb_val5', 120);
            $table->string('ttb_val6', 120);
            $table->string('ttb_val7', 120);
            $table->string('ttb_val8', 120);
            $table->string('ttb_val9', 120);
            $table->tinyInteger('ttb_estado')->default('1');
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
        Schema::drop('maestro_tabla');
    }
}
