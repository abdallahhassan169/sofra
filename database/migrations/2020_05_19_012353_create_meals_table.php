<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMealsTable extends Migration {

	public function up()
	{
		Schema::create('meals', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->float('price', 8,2);
			$table->float('offer_price', 8,2)->nullable();
			$table->float('evalution', 8,3);
			$table->time('time');
			$table->string('image')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('meals');
	}
}