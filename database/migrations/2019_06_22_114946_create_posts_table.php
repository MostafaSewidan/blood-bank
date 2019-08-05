<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('category_id');
			$table->string('image', 255);
			$table->string('title');
			$table->string('body');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}