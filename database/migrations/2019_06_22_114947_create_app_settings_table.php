<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppSettingsTable extends Migration {

	public function up()
	{
		Schema::create('app_settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('about_app');
			$table->string('phone');
			$table->string('email');
			$table->string('facebook_link');
			$table->string('twitter_link');
			$table->string('youtube_link');
			$table->string('instagram_link');
			$table->string('whats_app');
			$table->string('googleplus_link');
		});
	}

	public function down()
	{
		Schema::drop('app_settings');
	}
}