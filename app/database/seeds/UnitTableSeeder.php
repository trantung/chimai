<?php

class UnitTableSeeder extends Seeder {

	public function run()
	{
		AdminUnit::create([
			'name' => 'm2',
			'language' => 'vi',
		]);
		AdminUnit::create([
			'name' => 'm2',
			'language' => 'en',
		]);
		AdminUnit::create([
			'name' => 'viên',
			'language' => 'vi',
		]);
		AdminUnit::create([
			'name' => 'brick',
			'language' => 'en',
		]);
		AdminLanguage::create([
			'model_name' => 'AdminUnit',
			'model_id' => 1,
			'relate_name' => 'AdminUnit',
			'relate_id' => 2,
			'status' => ACTIVE,
			'weight_number' => VI,
		]);
		AdminLanguage::create([
			'model_name' => 'AdminUnit',
			'model_id' => 3,
			'relate_name' => 'AdminUnit',
			'relate_id' => 4,
			'status' => ACTIVE,
			'weight_number' => VI,
		]);

	}

}