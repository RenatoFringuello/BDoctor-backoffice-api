<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use Faker\Generator as Faker;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {


        for ($i = 0; $i < count(User::all()) * 3; $i++) {
            $newReview = new Review();
            $newReview->user_id = ($i < 40) ? $i + 1  : User::inRandomOrder()->first()->id;
            $newReview->email = $faker->email();
            $newReview->name = $faker->name();
            $newReview->lastname = $faker->lastName();
            $newReview->content = $faker->realTextBetween(50, 500);
            $newReview->rating = $faker->numberBetween(0, 10);
            $newReview->save();
        }
    }
}
