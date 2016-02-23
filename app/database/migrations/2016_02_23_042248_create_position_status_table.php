<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('position_status', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('model_id')->nullable();
			$table->string('model_name', 256)->nullable();
			$table->integer('relate_id')->nullable();
			$table->string('relate_name', 256)->nullable();
			$table->integer('position')->nullable();
			$table->integer('status')->nullable();
			$table->integer('weight_number')->nullable();
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
		Schema::drop('position_status');
	}

}
