<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixImageUrl extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//drop
		Schema::table('box_types', function(Blueprint $table) {
			$table->dropColumn('image_url')->after('id')->nullable();
		});
		Schema::table('box_products', function(Blueprint $table) {
			$table->dropColumn('image_url')->after('id')->nullable();
		});
		Schema::table('box_collections', function(Blueprint $table) {
			$table->dropColumn('image_url')->after('id')->nullable();
		});
		//create new
		Schema::table('box_types', function(Blueprint $table) {
			$table->string('image_url')->after('id')->nullable();
		});
		Schema::table('box_products', function(Blueprint $table) {
			$table->string('image_url')->after('id')->nullable();
		});
		Schema::table('box_collections', function(Blueprint $table) {
			$table->string('image_url')->after('id')->nullable();
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
