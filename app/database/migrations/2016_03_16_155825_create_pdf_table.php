<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdfTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pdf', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256)->nullable();
            $table->string('slug', 256)->nullable();
            $table->string('description', 500)->nullable();
            $table->string('link', 256)->nullable();
            $table->boolean('type')->nullable();
            $table->string('file', 256)->nullable();
            $table->string('image_url', 256)->nullable();
            $table->integer('status')->nullable();
			$table->integer('weight_number')->nullable();
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
		Schema::drop('pdf');
	}

}
