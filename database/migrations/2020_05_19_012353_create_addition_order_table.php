<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdditionOrderTable extends Migration {

	public function up()
	{
		Schema::create('addition_order', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('addition_id')->unsigned();
			$table->integer('order_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('addition_order');
	}
}