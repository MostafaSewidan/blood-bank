<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('city_id');
			$table->integer('blood_type_id');
            $table->string('api_token' , 60)->nullable();
			$table->string('name');
			$table->string('email');
			$table->string('birth_date' , 15);
			$table->string('donation_last_date' , 15);
			$table->string('phone');
			$table->string('password');
            $table->char('activation');
			$table->string('pin_code')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}