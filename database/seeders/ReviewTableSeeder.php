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
        $users = User::all();
        foreach ($users as $user) {
            for ($i = 0; $i < rand(5,15); $i++) {
                $newReview = new Review();
                $newReview->user_id = $user->id;
                $newReview->email = $faker->email();
                $newReview->name = $faker->name();
                $newReview->lastname = $faker->lastName();
                $newReview->content = $faker->realTextBetween(50, 500);
                $newReview->rating = $faker->numberBetween(0, 10);
                $newReview->save();
            }
        }
    }
}
