<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // List of specialization

        $specializations = [
            [
                "name" => "cardiology"
            ],
            [
                "name" => "dermatology"
            ],
            [
                "name" => "oncology"
            ],
            [
                "name" => "pediatrics"
            ],
            [
                "name" => "psychology"
            ],
            [
                "name" => "basic medicine"
            ],
            [
                "name" => "child psychology"
            ],
            [
                "name" => "dentistry"
            ],
            [
                "name" => "neurology"
            ],
            [
                "name" => "pulmonology"
            ],
            [
                "name" => "allergy and immunology"
            ],
            [
                "name" => "geriatrics"
            ],
            [
                "name" => "andrology"
            ],
            [
                "name" => "urology"
            ],
            [
                "name" => "gynecology"
            ],
            [
                "name" => "sports medicine"
            ],
            [
                "name" => "surgery"
            ],
            [
                "name" => "heart surgery"
            ],
            [
                "name" => "occupational medicine"
            ],
            [
                "name" => " endocrinology and metabolic diseases"
            ],
            [
                "name" => " psychiatrist"
            ],
            [
                "name" => "  rheumatology"
            ],
            [
                "name" => "  traumatology"
            ],
        ];

        foreach ($specializations as $specialization) {
            $newSpecialization = new Specialization();
            $newSpecialization->name = $specialization['name'];
            $newSpecialization->save();
        }
    }
}
