<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollctionBoxShowroom extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collection_box_showrooms', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('box_collection_id')->nullable();
            $table->integer('box_show_room_id')->nullable();
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
        Schema::drop('collection_box_showrooms');
	}

}
