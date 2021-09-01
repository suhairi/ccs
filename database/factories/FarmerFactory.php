<?php

namespace Database\Factories;

use App\Models\Farmer;
use Illuminate\Database\Eloquent\Factories\Factory;

class FarmerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Farmer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama'      => $this->faker->name(),
            'nokp'      => $this->faker->numerify('############'),
            'jantina'   => $this->faker->randomElement(['LELAKI', 'PEREMPUAN']),
            'umur'      => $this->faker->numberBetween(25,70),
            'pendidikan'=> $this->faker->randomElement(['PMR', 'SPM', 'IJAZAH', 'DIPLOMA', 'SARJANA', 'PHD', 'LAIN-LAIN']),
            'milikan'   => $this->faker->randomElement(['SENDIRI', 'SEWA']),
            'notel'     => $this->faker->phoneNumber(),
            'alamat'    => $this->faker->address()
        ];
    }
}
