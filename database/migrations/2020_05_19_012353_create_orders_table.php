<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('details');
			$table->integer('quantity');
			$table->string('address');
			$table->integer('payment_id')->unsigned();
			$table->integer('addition_id')->unsigned();
			$table->enum('state', array('pending', 'accepted', 'rejected', 'deleted', 'decline'));
			$table->integer('client_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}