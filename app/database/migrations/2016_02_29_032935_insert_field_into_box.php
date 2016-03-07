<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertFieldIntoBox extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('box_types', function(Blueprint $table) {
            $table->string('language', 256)->after('id')->nullable();
        });
        Schema::table('box_collections', function(Blueprint $table) {
            $table->string('language', 256)->after('id')->nullable();
        });
        Schema::table('box_products', function(Blueprint $table) {
            $table->string('language', 256)->after('id')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
