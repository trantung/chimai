<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 256)->nullable();
			$table->string('slug', 256)->nullable();
			$table->string('code', 256)->nullable();
			$table->string('image_url', 256)->nullable();
			$table->string('description', 500)->nullable();
			$table->integer('qty')->nullable();
			$table->string('price', 256)->nullable();
			$table->string('price_old', 256)->nullable();
			$table->integer('category_id')->nullable();
			$table->integer('surface_id')->nullable();
			$table->integer('origin_id')->nullable();
			$table->integer('material_id')->nullable();
			$table->integer('size_id')->nullable();
			$table->integer('unit_id')->nullable();
			$table->integer('weight_number')->nullable();
			$table->integer('status')->nullable();
			$table->string('language', 256)->nullable();
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
		Schema::drop('products');
	}

}
