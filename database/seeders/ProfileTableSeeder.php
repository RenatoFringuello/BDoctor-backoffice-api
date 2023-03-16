<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $newProfile = new Profile();
        $newProfile->user_id = User::inRandomOrder()->first()->id;
        $newProfile->picture = null;
        $newProfile->bio = $faker->realTextBetween(50, 500);
        $newProfile->curriculum = null;
        $newProfile->services =  Str::slug($faker->words(5, true), ', ');
        $newProfile->address = $faker->address();
        $newProfile->telephone = $faker->numerify('##########');
        $newProfile->save();
    }
}
