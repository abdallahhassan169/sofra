<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurantTypeTable extends Migration {

	public function up()
	{
		Schema::create('restaurant_type', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('restaurant_id')->unsigned();
			$table->integer('type_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('restaurant_type');
	}
}