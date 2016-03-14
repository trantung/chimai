<?php

class CategoryTableSeeder extends Seeder {

	public function run()
	{
		Category::create([
			'name' => 'Gạch ốp tường',
			'language' => 'vi',
			'slug' => 'gach-op-tuong',
		]);
		Category::create([
			'name' => 'Wall tiles',
			'language' => 'en',
			'slug' => 'wall-tiles',
		]);
		Category::create([
			'name' => 'Gạch lát nền',
			'language' => 'vi',
			'slug' => 'gach-lat-nen',
		]);
		Category::create([
			'name' => 'Floor tiling',
			'language' => 'en',
			'slug' => 'floor-tiling',
		]);
		 
	}

}