<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->string('title', 255)->nullable();
            $table->string('descriptionLink', 255)->nullable();
            $table->string('descriptionImageLink', 255)->nullable();
            $table->string('descriptionContent', 255)->nullable();
            $table->string('pubDate', 255)->nullable();
            $table->string('guid', 255)->nullable();
            $table->integer('channel_id')->unsigned();
            $table->foreign('channel_id')->references('id')->on('channels');
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
        Schema::dropIfExists('items');
    }
}
