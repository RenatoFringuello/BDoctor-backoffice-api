<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = Profile::all();

        foreach($profiles as $profile){
            $profile->specializations()->attach(Specialization::inRandomOrder()->limit(rand(1,4))->get());
        }
    }
}
