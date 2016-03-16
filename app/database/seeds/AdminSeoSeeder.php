<?php

class AdminSeoSeeder extends Seeder {

	public function run()
	{
		//type game 
		AdminSeo::create([
			'model_name'=> 'BoxType',
			'model_id' => 1,
			'title_site' => 'This is BoxType',
			'description_site' => 'This is BoxType',
			'keyword_site' => 'This is BoxType',
		]);
		AdminSeo::create([
			'model_name'=> 'BoxType',
			'model_id' => 2,
			'title_site' => 'This is BoxType',
			'description_site' => 'This is BoxType',
			'keyword_site' => 'This is BoxType',
		]);
		//seo script
		AdminSeo::create([
			'model_name'=> SEO_DEFAULT,
			'title_site' => 'Công ty cổ phần MKD',
			'description_site' => 'Công ty cổ phần MKD',
			'keyword_site' => 'Công ty cổ phần MKD',
			'header_script' => '',
			'footer_script' => '',
		]);
	}
}