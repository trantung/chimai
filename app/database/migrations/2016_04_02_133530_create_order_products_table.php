<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id')->nullable();
			$table->integer('product_id')->nullable();
			$table->string('price', 256)->nullable();
			$table->integer('qty')->nullable();
			$table->string('amount', 256)->nullable();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_products');
	}

}
