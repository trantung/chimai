<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOriginTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('origins', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 256)->nullable();
			$table->integer('weight_number')->nullable();
			$table->integer('status')->nullable();
			$table->string('language', 256)->nullable();
			$table->string('slug', 256)->nullable();
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
		Schema::drop('origins');
	}

}
