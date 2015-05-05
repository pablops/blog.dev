<?php 

class UserTableSeeder extends Seeder {

	public function run()
	{
		// DB::table('users')->delete();

		for ($i = 1; $i <= 100; $i++) {
			$user2           = new User();
			$user2->email    = "chatty@chatmail.$i";
			$user2->password = "password";
			$user2->save();
		}
	}
}

 ?>