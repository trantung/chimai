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
			'name' => 'gói',
			'language' => 'vi',
		]);
		AdminUnit::create([
			'name' => 'package',
			'language' => 'en',
		]);
		AdminLanguage::create([
			'model_name' => 'AdminUnit',
			'model_id' => 1,
			'relate_name' => 'AdminUnit',
			'relate_id' => 2,
		]);
	}

}