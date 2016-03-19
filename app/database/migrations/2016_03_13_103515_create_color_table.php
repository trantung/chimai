<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colors', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('product_id')->nullable();
			$table->string('name', 256)->nullable();
			$table->string('image_url', 256)->nullable();
			$table->integer('weight_number')->nullable();
			$table->integer('status')->nullable();
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
		Schema::drop('colors');
	}

}