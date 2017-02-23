<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RHSetupAccessTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('cRecursos')->table(config('accessRH.users_table'), function ($table) {
            $table->tinyInteger('status')->after('password')->default(1)->unsigned();
        });

        Schema::connection('cRecursos')->create(config('accessRH.roles_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->boolean('all')->default(false);
            $table->smallInteger('sort')->default(0)->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at');

            /**
             * Add Foreign/Unique/Index
             */
            $table->unique('name');
        });

        Schema::connection('cRecursos')->create(config('accessRH.assigned_roles_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id')
                ->references('id')
                ->on(config('accessRH.users_table'))
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on(config('accessRH.roles_table'))
                ->onDelete('cascade');
        });

        Schema::connection('cRecursos')->create(config('accessRH.permissions_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('display_name');
            $table->smallInteger('sort')->default(0)->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at');

            /**
             * Add Foreign/Unique/Index
             */
            $table->unique('name');
        });

        Schema::connection('cRecursos')->create(config('accessRH.permission_role_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('permission_id')
                ->references('id')
                ->on(config('accessRH.permissions_table'))
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on(config('accessRH.roles_table'))
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
        Schema::connection('cRecursos')->table(config('accessRH.users_table'), function (Blueprint $table) {
            $table->dropColumn('status');
        });

        /**
         * Remove Foreign/Unique/Index
         */
        Schema::connection('cRecursos')->table(config('accessRH.roles_table'), function (Blueprint $table) {
            $table->dropUnique(config('accessRH.roles_table') . '_name_unique');
        });

        Schema::connection('cRecursos')->table(config('accessRH.assigned_roles_table'), function (Blueprint $table) {
            $table->dropForeign(config('accessRH.assigned_roles_table') . '_user_id_foreign');
            $table->dropForeign(config('accessRH.assigned_roles_table') . '_role_id_foreign');
        });

        Schema::connection('cRecursos')->table(config('accessRH.permissions_table'), function (Blueprint $table) {
            $table->dropUnique(config('accessRH.permissions_table') . '_name_unique');
        });

        Schema::connection('cRecursos')->table(config('accessRH.permission_role_table'), function (Blueprint $table) {
            $table->dropForeign(config('accessRH.permission_role_table') . '_permission_id_foreign');
            $table->dropForeign(config('accessRH.permission_role_table') . '_role_id_foreign');
        });

        /**
         * Drop tables
         */
        Schema::connection('cRecursos')->drop(config('accessRH.assigned_roles_table'));
        Schema::connection('cRecursos')->drop(config('accessRH.permission_role_table'));
        Schema::connection('cRecursos')->drop(config('accessRH.roles_table'));
        Schema::connection('cRecursos')->drop(config('accessRH.permissions_table'));
    }
}
