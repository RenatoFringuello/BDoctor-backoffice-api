<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            [
                "type" => "noSponsor",
                "price" => 0.00,
                "duration" => 0
            ],
            [
                "type" => "basic",
                "price" => 2.99,
                "duration" => 24
            ],
            [
                "type" => "intermediate",
                "price" => 5.99,
                "duration" => 72
            ],
            [
                "type" => "advanced",
                "price" => 9.99,
                "duration" => 144
            ],
        ];

        foreach ($sponsors as $sponsor) {
            $newSponsor = new Sponsor();
            $newSponsor->type = $sponsor['type'];
            $newSponsor->price = $sponsor['price'];
            $newSponsor->duration = $sponsor['duration'];
            $newSponsor->save();
        }
    }
}
