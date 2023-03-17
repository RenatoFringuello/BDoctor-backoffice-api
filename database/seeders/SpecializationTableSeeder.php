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
            'cardiologia',
            'dermatologia',
            'oncologia',
            'pediatria',
            'psicologia',
            'medicina di base',
            'psicologia infantile',
            'odontoiatria',
            'neurologia',
            'pneumologia',
            'allergologia e immunologia',
            'geriatria',
            'andrologia',
            'urologia',
            'ginecologia',
            'medicina dello sport',
            'chirurgia',
            'cardiochirurgia ',
            'medicina del lavoro',
            'endocrinologia e malattie del metabolismo',
            'psichiatra',
            'reumatologia',
            'traumotologia'
        ];

        foreach ($specializationList as $specialization) {
            $newSpecialization = new Specialization();
            $newSpecialization->name = $specialization;
            $newSpecialization->save();
        }
    }
}
