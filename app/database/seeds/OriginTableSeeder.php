<?php

class OriginTableSeeder extends Seeder {

	public function run()
	{
		Origin::create([
			'name' => 'Tây Ban Nha',
			'language' => 'vi',
			'slug' => 'tay-ban-nha',
		]);
		Origin::create([
			'name' => 'Spain',
			'language' => 'en',
			'slug' => 'spain',
		]);
		Origin::create([
			'name' => 'Ấn Độ',
			'language' => 'vi',
			'slug' => 'an-do',
		]);
		Origin::create([
			'name' => 'India',
			'language' => 'en',
			'slug' => 'india',
		]);
	}
}