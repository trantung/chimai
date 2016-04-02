<?php

class RoleUserTableSeeder extends Seeder {

	public function run()
	{
		RoleUser::create([
			'name' => 'Khách lẻ',
			'description' => '',
			'status' => 1,
		]);
		RoleUser::create([
			'name' => 'Kiến trúc sư',
			'description' => '',
			'status' => 1,			
		]);
		RoleUser::create([
			'name' => 'Đại lý',
			'description' => '',
			'status' => 1,
		]);
		RoleUser::create([
			'name' => 'VIP',
			'description' => '',
			'status' => 1,
		]);

	}

}