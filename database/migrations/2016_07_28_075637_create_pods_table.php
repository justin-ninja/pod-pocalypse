<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('community_id')->unsigned();
            $table->foreign('community_id')->references('id')->on('communities');
            $table->string('name');
            $table->decimal('cost_each',5,2);
            $table->decimal('price_each',5,2);
            $table->integer('qty');
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
        Schema::drop('pods');
    }
}
