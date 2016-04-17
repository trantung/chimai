<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create([
				'role_user_id' => 1,
				'email'=>'user1@gmail.com',
				'password'=>Hash::make('123456'),
				'username'=> 'user1@gmail.com',
				'phone'=> '0912345678',
				'address'=> 'Ha Noi',
				'fullname'=> 'Nguyen Van A',
				'status' => 1,
				'type' => 1
			]);
		User::create([
				'role_user_id' => 2,
				'email'=>'user2@gmail.com',
				'password'=>Hash::make('123456'),
				'username'=> 'user2@gmail.com',
				'phone'=> '0912345678',
				'address'=> 'Ha Noi',
				'fullname'=> 'Nguyen Van B',
				'status' => 1,
				'type' => 1
			]);
		User::create([
				'role_user_id' => 3,
				'email'=>'user3@gmail.com',
				'password'=>Hash::make('123456'),
				'username'=> 'user3@gmail.com',
				'phone'=> '0912345678',
				'address'=> 'Ha Noi',
				'fullname'=> 'Nguyen Van C',
				'status' => 1,
				'type' => 1
			]);
		User::create([
				'role_user_id' => 4,
				'email'=>'user4@gmail.com',
				'password'=>Hash::make('123456'),
				'username'=> 'user4@gmail.com',
				'phone'=> '0912345678',
				'address'=> 'Ha Noi',
				'fullname'=> 'Nguyen Van D',
				'status' => 1,
				'type' => 1
			]);

	}

}