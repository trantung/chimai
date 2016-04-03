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
		//Box khuyen mai
		$this->call('BoxPromotionTableSeeder');
		//category
		// $this->call('CategoryTableSeeder');
		//chat lieu
		// $this->call('MaterialTableSeeder');
		//made in
		$this->call('OriginTableSeeder');
		//size
		// $this->call('SizeTableSeeder');
		//be mat
		// $this->call('SurfaceTableSeeder');
		$this->call('BoxCommonTableSeeder');
		//language		
		$this->call('LanguageTableSeeder');
		
		$this->call('ConfigCodeTableSeeder');

		$this->call('AdminSeoSeeder');
		
		$this->call('UnitTableSeeder');

		$this->call('RoleUserTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('DiscountTableSeeder');

		
	}

}
