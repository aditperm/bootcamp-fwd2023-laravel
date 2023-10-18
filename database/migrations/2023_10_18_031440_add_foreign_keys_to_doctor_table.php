<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctor', function (Blueprint $table) {
            $table->foreign('specialist_id', 'fk_doctor_to_specialist')
            ->references('id')->on('specialist')->onDelete('CASCADE')
            ->onUpdate('CASCADE'); //dari table user id ke table users
            //cascade = diperbolehkan akses nya
            //strict = tidak boleh dihapus
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor', function (Blueprint $table) {
            $table->dropForeign('fk_doctor_to_specialist');
        });
    }
}