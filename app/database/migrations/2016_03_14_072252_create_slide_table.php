<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slide', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('type')->nullable();
            $table->string('image_url', 256)->nullable();
            $table->string('name', 256)->nullable();
            $table->string('description', 500)->nullable();
            $table->string('link', 256)->nullable();
            $table->string('language', 256)->nullable();
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
		Schema::drop('slide');
	}

}
