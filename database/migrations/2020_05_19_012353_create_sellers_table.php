<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSellersTable extends Migration {

	public function up()
	{
		Schema::create('sellers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->integer('city_id')->unsigned();
			$table->integer('area_id');
			$table->string('password');
			$table->string('whatsapp');
			$table->string('contact_phone');
			$table->string('contact_whatsapp');
			$table->string('image');
		});
	}

	public function down()
	{
		Schema::drop('sellers');
	}
}