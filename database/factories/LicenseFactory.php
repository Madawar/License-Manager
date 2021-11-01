<?php

namespace Database\Factories;

use App\Models\License;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LicenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = License::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'license_type' => $this->faker->randomElement(['warranty', 'license', 'certification']),
            'last_acquired' => Carbon::today()->subDays(rand(0, 365)),
            'notes' => $this->faker->text(),
            'renewal' => $this->faker->numberBetween(6, 12),
            'license_key' => $this->faker->lexify('id-????-xyx-???'),
            'notify' => $this->faker->email(),
            'reminder' => $this->faker->numberBetween(6, 12),
            'license_period' => 'months',
            'license_reminder_period' => 'months',
            'department_id' => $this->faker->numberBetween(1, 5),


        ];
    }
}
