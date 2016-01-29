<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyToProtestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('protestos', function (Blueprint $table) {
            $table->foreign('pro_girador_id')->references('id')->on('girador');
            $table->foreign('pro_acepta_id')->references('id')->on('acepta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('protestos', function (Blueprint $table) {
            $table->dropForeign('protestos_pro_acepta_id_foreign');
            $table->dropForeign('protestos_pro_girador_id_foreign');
        });
    }
}
