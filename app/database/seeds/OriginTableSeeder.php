<?php

class OriginTableSeeder extends Seeder {

	public function run()
	{
		Origin::create([
			'name' => 'Tây Ban Nha',
			'weight_number' => 1,
			'status' => 1,
			'language' => 'vi',
			'slug' => 'tay-ban-nha',
		]);
		Origin::create([
			'name' => 'Spain',
			'weight_number' => 1,
			'status' => 1,
			'language' => 'en',
			'slug' => 'spain',
		]);
		Origin::create([
			'name' => 'Ấn Độ',
			'weight_number' => 2,
			'status' => 1,
			'language' => 'vi',
			'slug' => 'an-do',
		]);
		Origin::create([
			'name' => 'India',
			'weight_number' => 2,
			'status' => 1,
			'language' => 'en',
			'slug' => 'india',
		]);
	}
}