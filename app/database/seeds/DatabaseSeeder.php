<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('RoleTableSeeder');
		$this->call('AdminTableSeeder');
		$this->call('BoxPromotionTableSeeder');
		$this->call('CategoryTableSeeder');
		$this->call('MaterialTableSeeder');
		$this->call('OriginTableSeeder');
		$this->call('SizeTableSeeder');
		$this->call('SurfaceTableSeeder');
		$this->call('BoxCommonTableSeeder');
		$this->call('LanguageTableSeeder');
		$this->call('ConfigCodeTableSeeder');
	}

}
