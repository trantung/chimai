<?php

class BoxCommonTableSeeder extends Seeder {

	public function run()
	{
		BoxCommon::create([
			'model_name' => 'BoxPromotion',
			'relate_name' => 'BoxPromotion',
			'model_id' => 1,
			'relate_id' => 2,
			'position' => 1,
			'status' => 1,
			'weight_number' => 3,
		]);
		BoxCommon::create([
			'model_name' => 'BoxPromotion',
			'relate_name' => 'BoxPromotion',
			'model_id' => 1,
			'relate_id' => 2,
			'position' => 2,
			'status' => 1,
			'weight_number' => 2,
		]);
		BoxCommon::create([
			'model_name' => 'BoxPromotion',
			'relate_name' => 'BoxPromotion',
			'model_id' => 1,
			'relate_id' => 2,
			'position' => 3,
			'status' => 1,
			'weight_number' => 4,
		]);
	}

}