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
        $specializationList = [
            'cardiology',
            'dermatology',
            'oncology',
            'pediatrics',
            'psychology',
            'basic medicine',
            'child psychology',
            'dentistry',
            'neurology',
            'pulmonology',
            'allergy and immunology',
            'geriatrics',
            'andrology',
            'urology',
            'gynecology',
            'sports medicine',
            'surgery',
            'heart surgery',
            'occupational medicine',
            'endocrinology and metabolic diseases',
            'psychiatrist',
            'rheumatology',
            'traumatology'
        ];

        foreach ($specializationList as $specialization) {
            $newSpecialization = new Specialization();
            $newSpecialization->name = $specialization;
            $newSpecialization->save();
        }
    }
}
