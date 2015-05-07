<?php 

class PostsTableSeeder extends Seeder {

	public function run()
	{
		// DB::table('users')->delete();

		for ($i = 11; $i <= 100; $i++) {
			$post1            = new Post();
			$post1->title     = "title $i";
			$post1->body      = "the $i body $i the $i body $i
								 the $i body $i the $i body $i
								 the $i body $i the $i body $i
								 the $i body $i the $i body $i
								 the $i body $i the $i body $i";
			$post1->slug      = "title $i";
			$post1->user_id   = User::all()->random()->id;
			$post1->save();
		}
	}
}

 ?>