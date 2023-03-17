<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newUser = new User();
        $newUser->name = 'Gino';
        $newUser->lastname = 'Ginetti';
        $newUser->email = 'g@gmail.com';//ricordiamoci che se lo implementiamo con il for di metterlo unique
        $newUser->password = Hash::make(12345678);
        $newUser->isActive = true;
        $newUser->save();
    }
}