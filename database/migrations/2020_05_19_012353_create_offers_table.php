<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration {

	public function up()
	{
		Schema::create('offers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('restaurant_id')->unsigned();
			$table->text('text');
			$table->datetime('date_from');
			$table->datetime('date_to');
			$table->integer('meal_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('offers');
	}
}