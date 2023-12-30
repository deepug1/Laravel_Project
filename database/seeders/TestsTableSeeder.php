<?php

namespace Database\Seeders;

// database/seeders/TestsTableSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestsTableSeeder extends Seeder
{
    public function run()
    {
        $tests = [
            'Blood Test', // Update the seed data
            'Urine Analysis',
            'X-rays',
            'CT Scans',
            'MRI Scans',
            'Ultrasound',
            'Mammography',
            'Allergy Testing',
            'Endoscopy and Colonoscopy',
        ];

        foreach ($tests as $test) {
            DB::table('tests')->insert(['test_name' => $test]); // Change this line
        }
    }
}
