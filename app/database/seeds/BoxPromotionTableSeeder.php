<?php

class BoxPromotionTableSeeder extends Seeder {

	public function run()
	{
		BoxPromotion::create([
			'name_menu' => 'Khuyến mãi',
			'name_content' => 'Khuyến mãi',
			'name_footer' => '',
			'image_url' => '',
			'language' => 'vi',
			'slug' => 'khuyen-mai',
		]);
		BoxPromotion::create([
			'name_menu' => 'Promotion',
			'name_content' => 'Promotion',
			'name_footer' => '',
			'image_url' => '',
			'language' => 'en',
			'slug' => 'promotion',
		]);
	}

}