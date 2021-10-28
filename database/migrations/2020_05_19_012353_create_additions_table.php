<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdditionsTable extends Migration {

	public function up()
	{
		Schema::create('additions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('restaurant_id')->unsigned();
			$table->string('name');
		});
	}

	public function down()
	{
		Schema::drop('additions');
	}
}