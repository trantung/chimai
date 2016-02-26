<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('box_types', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name_menu', 256)->nullable();
			$table->string('name_content', 256)->nullable();
			$table->integer('weight_number')->nullable();
			$table->integer('status')->nullable();
			$table->integer('position')->nullable();
			$table->string('slug', 256)->nullable();
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
		Schema::drop('box_types');
	}

}
