<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\License;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $departments = [
            'ICT',
            'Human Resource',
            'Safety and Audit',
            'Security',
            'Operations'
        ];

        foreach ($departments as $department) {
            Department::create(array(
                'name' => $department,
                'email' => 'no-reply@afske.aero'
            ));
        }

        $licenses = [
            'Commercial Single-Engine License',
            'Commercial Multi-Engine License',
            'Airline Transport Pilot',
            'Certified Flight Instructor',
            'Certified Flight Instructor'

        ];
        foreach ($licenses as $license) {
            License::factory()->create([
                'license_certification' => $license,
            ]);
        }


        //  License::factory()->count(15)->create();
    }
}
