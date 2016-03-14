<?php

class MaterialTableSeeder extends Seeder {

	public function run()
	{
		Material::create([
			'name' => 'Gạch Ceramic',
			'language' => 'vi',
			'slug' => 'gach-ceramic',
		]);
		Material::create([
			'name' => 'Ceramic',
			'language' => 'en',
			'slug' => 'ceramic',
		]);
		Material::create([
			'name' => 'Gạch Pocelaine',
			'language' => 'vi',
			'slug' => 'gach-pocelaine',
		]);
		Material::create([
			'name' => 'Pocelaine',
			'language' => 'en',
			'slug' => 'pocelaine',
		]);
	}

}