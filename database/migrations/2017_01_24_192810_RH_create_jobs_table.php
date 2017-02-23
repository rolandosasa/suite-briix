<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RHCreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('cRecursos')->create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_jobs')->unique();
            $table->string('department', 50);
            $table->string('job_description');
            $table->string('immediate_boss', 50);
            $table->string('supervises', 50);
            $table->string('responsabilities');
            $table->integer('salary_basic');
            $table->integer('salary_global');
            $table->softDeletes();
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
        Schema::connection('cRecursos')->drop('jobs');
    }
}
