<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BRIIXSetupPaquetesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('briix')->create(config('access.packets_table'), function ($table) {
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

        Schema::connection('briix')->create(config('access.assigned_packets_table'), function ($table) {
            $table->increments('id')->unsigned();

           // $table->integer('user_id')->unsigned();
            $table->integer('contract_id')->unsigned();
            $table->integer('packet_id')->unsigned();
            /**
             * Add Foreign/Unique/Index
             */
            /* $table->foreign('user_id')
                ->references('id')
                ->on(config('access.users_table'))
                ->onDelete('cascade');*/
            $table->foreign('contract_id')
                ->references('id')
                ->on(config('access.contracts_table'))
                ->onDelete('cascade');
            $table->foreign('packet_id')
                ->references('id')
                ->on(config('access.packets_table'))
                ->onDelete('cascade');
        });


        Schema::connection('briix')->create(config('access.products_table'), function ($table) {
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

        Schema::connection('briix')->create(config('access.packet_product_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('packet_id')->unsigned();

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('product_id')
                ->references('id')
                ->on(config('access.products_table'))
                ->onDelete('cascade');

            $table->foreign('packet_id')
                ->references('id')
                ->on(config('access.packets_table'))
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
        /**
         * Remove Foreign/Unique/Index
         */
        Schema::connection('briix')->table(config('access.packets_table'), function (Blueprint $table) {
            $table->dropUnique(config('access.packets_table') . '_name_unique');
        });

        Schema::connection('briix')->table(config('access.assigned_packets_table'), function (Blueprint $table) {
            $table->dropForeign(config('access.assigned_packets_table') . '_contract_id_foreign');
            $table->dropForeign(config('access.assigned_packets_table') . '_packet_id_foreign');
        });


        Schema::connection('briix')->table(config('access.products_table'), function (Blueprint $table) {
            $table->dropUnique(config('access.products_table') . '_name_unique');
        });

        Schema::connection('briix')->table(config('access.packet_product_table'), function (Blueprint $table) {
            $table->dropForeign(config('access.packet_product_table') . '_product_id_foreign');
            $table->dropForeign(config('access.packet_product_table') . '_packet_id_foreign');
        });

        /**
         * Drop tables
         */
        Schema::connection('briix')->drop(config('access.assigned_packets_table'));
        Schema::connection('briix')->drop(config('access.packet_product_table'));
        Schema::connection('briix')->drop(config('access.packets_table'));
        Schema::connection('briix')->drop(config('access.products_table'));
    }
}
