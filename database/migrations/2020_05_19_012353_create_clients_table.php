<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('phone')->unique();
			$table->integer('city_id')->unsigned();
			$table->integer('area_id')->unsigned();
			$table->string('password');
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}