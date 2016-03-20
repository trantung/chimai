<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTbl extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 256)->nullable();
			$table->string('slug', 256)->nullable();
			$table->integer('parent_id')->nullable();
			$table->integer('type_new_id')->nullable();
			$table->string('image_url', 256)->nullable();
			$table->string('sapo', 500)->nullable();
			$table->text('description')->nullable();
			$table->integer('weight_number')->nullable();
			$table->integer('status')->nullable();
			$table->string('language', 256)->nullable();
			$table->string('start_date', 256)->nullable();
			$table->integer('count_view')->nullable();
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
