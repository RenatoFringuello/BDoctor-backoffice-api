<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SponsorUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            $sponsorSelected = Sponsor::inRandomOrder()->first();
            $user->sponsors()->attach($sponsorSelected->id, ['start_date' => Carbon::now(), 'end_date' => Carbon::now()->addHour($sponsorSelected->duration)]);
        }
    }
}
