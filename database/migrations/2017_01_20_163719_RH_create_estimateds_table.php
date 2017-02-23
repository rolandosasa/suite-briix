<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RHCreateEstimatedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('cRecursos')->create('estimateds', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('time_programmed');
            $table->decimal('time_difference');
            $table->decimal('advance_percent');
            $table->float('income');
            $table->string('comment');
            $table->integer('month_id')->unsigned();
            $table->integer('concept_id')->unsigned();
            $table->timestamps();

            $table->foreign('concept_id')
                ->references('id')
                ->on(config('accessRH.concepts_table'))
                ->onDelete('cascade');

            $table->foreign('month_id')
                ->references('id')
                ->on(config('accessRH.months_table'))
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('cRecursos')->drop('estimateds');
    }
}
