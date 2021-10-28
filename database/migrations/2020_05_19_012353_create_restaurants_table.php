<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurantsTable extends Migration {

	public function up()
	{
		Schema::create('restaurants', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('image');
			$table->float('less_price', 8,2);
			$table->float('delivery_price', 8,3);
			$table->boolean('active')->default(1);
			$table->text('details');
			$table->integer('city_id')->unsigned();
			$table->integer('area_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('restaurants');
	}
}