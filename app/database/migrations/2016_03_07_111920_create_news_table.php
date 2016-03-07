<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('parent_id')->nullable();
			$table->integer('weight_number')->nullable();
			$table->integer('status')->nullable();
			$table->string('title', 256)->nullable();
			$table->string('description', 256)->nullable();
			$table->string('image_url', 256)->nullable();
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
		Schema::drop('news');
	}

}
