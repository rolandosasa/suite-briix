<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RHCreateHumanResourcesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('cRecursos')->create('human_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');            
            $table->string('department');
            $table->string('applicant_name');
            $table->string('cargo');
            $table->string('reason');
            $table->string('vacant_name');
            $table->string('department_a');
            $table->string('manager');
            $table->string('position');
            $table->string('phone');
            $table->string('email');
            $table->string('genre');
            $table->string('civil_state');
            $table->string('level_education');
            $table->string('career');
            $table->string('quantity');
            $table->string('department2');
            $table->string('state_id');
            $table->string('city');
            $table->string('schedule');
            $table->string('working_days');
            $table->string('position2');
            $table->string('lenguages');
            $table->string('basic_salary');
            $table->string('overall_salary');
            $table->string('age_range');
            $table->string('description');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::connection('cRecursos')->drop('human_resources');
    }
}
