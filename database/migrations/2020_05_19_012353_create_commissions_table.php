<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommissionsTable extends Migration {

	public function up()
	{
		Schema::create('commissions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->float('restaurant_sells', 8,2);
			$table->float('app_commision');
			$table->float('payed');
			$table->float('stayed', 8,2);
		});
	}

	public function down()
	{
		Schema::drop('commissions');
	}
}