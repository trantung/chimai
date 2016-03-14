<?php

class SurfaceTableSeeder extends Seeder {

	public function run()
	{
		Surface::create([
			'name' => 'Men bóng',
			'language' => 'vi',
			'slug' => 'men-bong',
		]);
		Surface::create([
			'name' => 'Glazed',
			'language' => 'en',
			'slug' => 'glazed',
		]);
		Surface::create([
			'name' => 'Men thường',
			'language' => 'vi',
			'slug' => 'men-thuong',
		]);
		Surface::create([
			'name' => 'Glazed normal',
			'language' => 'en',
			'slug' => 'glazed-normal',
		]);

	}

}