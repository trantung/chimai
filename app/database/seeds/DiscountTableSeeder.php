<?php

class DiscountTableSeeder extends Seeder {

	public function run()
	{
		Discount::create([
				'role_user_id' => 2,
				'value'=> '10',
				'description' => '',
			]);
		Discount::create([
				'role_user_id' => 3,
				'value'=> '17',
				'description' => '',
			]);
		Discount::create([
				'role_user_id' => 4,
				'value'=> '5',
				'description' => '',
			]);

	}

}