<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MessageTableSeeder extends Seeder
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
            for ($i = 0; $i < rand(3,10); $i++) {
                $newMessage = new Message();
                $newMessage->user_id = $user->id;
                $newMessage->name = $faker->name();
                $newMessage->lastname = $faker->lastName();
                $newMessage->email = $faker->email();
                $newMessage->content = $faker->realTextBetween(50, 500);
                $newMessage->save();
            }
        }
    }
}
