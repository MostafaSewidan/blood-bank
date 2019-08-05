<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('blood_type_id');
			$table->integer('city_id');
			$table->string('patient_name');
			$table->string('age');
			$table->string('bags_number');
			$table->string('hospital_name');
			$table->string('hospital_address');
			$table->string('phone');
			$table->text('detail');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}