<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('users')->truncate();

		User::create(
			[
				'username'	=>	'admin',
				'firstname'	=>	'Sinkim',
				'lastname'	=>	'Yun',
				'user_role_id'		=>	2,
				'password'	=>	Hash::make('111111'),
				'email'	=>	'younsinkim@yahoo.com',
				'address'	=>	'Phnom Penh',
				'sex'	=>	'1',
				'age'	=>	'27',
				'active'	=>	1
			]
		);
	}
}