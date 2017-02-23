<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CMCreateHistoryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::connection('cmovil')->create('history_types', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->timestamps();
        });

        Schema::connection('cmovil')->create('history', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('entity_id')->unsigned()->nullable();
            $table->string('icon')->nullable();
            $table->string('class')->nullable();
            $table->string('text');
            $table->string('assets')->nullable();
            $table->timestamps();

            $table->foreign('type_id')
                ->references('id')
                ->on('history_types')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on(config('accessCM.users_table'))
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::connection('cmovil')->table('history', function (Blueprint $table) {
            $table->dropForeign('history_type_id_foreign');
            $table->dropForeign('history_user_id_foreign');
        });

        Schema::connection('cmovil')->drop('history_types');
        Schema::connection('cmovil')->drop('history');
    }
}
