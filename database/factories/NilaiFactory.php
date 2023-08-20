<?php

namespace Database\Factories;

use App\Models\Matpel;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class NilaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "lat_soal1"=>$this->faker->numberBetween(50, 100),
            "lat_soal2"=>$this->faker->numberBetween(50, 100),
            "lat_soal3"=>$this->faker->numberBetween(50, 100),
            "lat_soal4"=>$this->faker->numberBetween(50, 100),
            "uh1"=>$this->faker->numberBetween(50, 100),
            "uh2"=>$this->faker->numberBetween(50, 100),
            "uts"=>$this->faker->numberBetween(50, 100),
            "uas"=>$this->faker->numberBetween(50, 100),
            "siswa_id"=>Siswa::all()->random()->id,
            "matpel_id"=>Matpel::all()->random()->id,
            //
        ];
    }
}
