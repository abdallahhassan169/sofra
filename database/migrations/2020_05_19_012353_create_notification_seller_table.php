<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationSellerTable extends Migration {

	public function up()
	{
		Schema::create('notification_seller', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('notifacation_id')->unsigned();
			$table->integer('seller_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('notification_seller');
	}
}