<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyUbigeoToTableGirador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('girador', function (Blueprint $table) {
            $table->foreign('gir_ubg_id')->references('id')->on('ubigeo');
        });

        Schema::table('acepta', function (Blueprint $table) {
            $table->foreign('acp_ubg_id')->references('id')->on('ubigeo');
        });

        Schema::table('persona', function (Blueprint $table) {
            $table->foreign('per_ubg_id')->references('id')->on('ubigeo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('girador', function (Blueprint $table) {
            $table->dropForeign('girador_gir_ubg_id_foreign');
        });
        Schema::table('acepta', function (Blueprint $table) {
            $table->dropForeign('acepta_acp_ubg_id_foreign');
        });
        Schema::table('persona', function (Blueprint $table) {
            $table->dropForeign('persona_per_ubg_id_foreign');
        });
    }
}
