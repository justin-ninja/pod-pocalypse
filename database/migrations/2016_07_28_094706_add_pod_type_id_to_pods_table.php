<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPodTypeIdToPodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pods', function (Blueprint $table) {
            $table->integer('pod_type_id')->unsigned();
            $table->foreign('pod_type_id')->references('id')->on('pod_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pods', function (Blueprint $table) {
            //
        });
    }
}
