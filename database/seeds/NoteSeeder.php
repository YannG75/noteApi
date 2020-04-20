<?php

use App\Notes;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('fr_FR');
        for ($i = 0; $i < 5; $i++) {
            $post = new Notes();
            $post->content = $faker->realText(30);
            $post->save();
        }
    }
}
