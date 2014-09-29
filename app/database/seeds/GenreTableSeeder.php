<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GenreTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$genres = Genre::all();
		foreach($genres as $genre)
		{
			$slug = Str::slug(strtolower(trim($genre->name)));
			$genre->slug = $slug;
			$genre->save();

		}
	}

}