<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplaysTable extends Migration 
{
	public function up()
	{
		Schema::create('replays', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('topic_id')->unsigned()->default(0)->index();
            $table->integer('user_id')->unsigned()->default(0)->index();
            $table->text('content');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('replays');
	}
}
