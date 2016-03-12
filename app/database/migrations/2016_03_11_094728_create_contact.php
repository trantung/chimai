<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContact extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->nullable();
            $table->string('name', 256)->nullable();
            $table->string('email', 256)->nullable();
            $table->string('phone', 256)->nullable();
            $table->string('address', 256)->nullable();
            $table->text('message', 500)->nullable();
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
		Schema::drop('contacts');
	}

}
