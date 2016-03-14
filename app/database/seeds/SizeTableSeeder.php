<?php

class SizeTableSeeder extends Seeder {

	public function run()
	{
		Size::create([
			'name' => '300x300',
			'language' => 'vi',
		]);
		Size::create([
			'name' => '300x300',
			'language' => 'en',
		]);
		Size::create([
			'name' => '300x450',
			'language' => 'vi',
		]);
		Size::create([
			'name' => '300x450',
			'language' => 'en',
		]);

	}

}