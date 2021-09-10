<?php

use App\Illness;
use Illuminate\Database\Seeder;

class IllnessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Illness::create([
            'illness' => 'Heart Disease'
        ]);
        Illness::create([
            'illness' => 'Measles'
        ]);
        Illness::create([
            'illness' => 'Diabetes'
        ]);
        Illness::create([
            'illness' => 'Asthma'
        ]);
        Illness::create([
            'illness' => 'Allergy (Food, Medicine)'
        ]);
        Illness::create([
            'illness' => 'Hepatitis'
        ]);
        Illness::create([
            'illness' => 'Seizures (Convulsions)'
        ]);
        Illness::create([
            'illness' => 'Scoliosis'
        ]);
        Illness::create([
            'illness' => 'Primary Pulmonary Infection'
        ]);
        Illness::create([
            'illness' => 'Otitis Externa Media (Ear Discharge)'
        ]);
        Illness::create([
            'illness' => 'Urinary Tract Infection'
        ]);
        Illness::create([
            'illness' => 'Chicken Pox'
        ]);
        Illness::create([
            'illness' => 'Mumps'
        ]);
        Illness::create([
            'illness' => 'Typhoid'
        ]);
        Illness::create([
            'illness' => 'Nose Bleeding'
        ]);
        Illness::create([
            'illness' => 'Ulcer'
        ]);
        Illness::create([
            'illness' => 'Anemia'
        ]);
        Illness::create([
            'illness' => 'Tonsillitis'
        ]);
    }
}
