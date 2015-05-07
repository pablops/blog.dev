<?php 

class UserTableSeeder extends Seeder {
	
	public function run()
	{
		for ($i = 1; $i <= 100; $i++) {
			$user1                = new User();
			$user1->email         = "email@email.$i";
			$user1->password      = $_ENV['DEFAULT_USER'];
			$user1->save();
		}
	}
}

 ?>