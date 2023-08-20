<?php

namespace Database\Factories;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $first =$this->faker->unique()->firstName($gender = null);
        $last = $this->faker->unique()->lastName();
        return [
            'nama'=>$first." ".$last,
            'nisn'=>"00".$this->faker->unique()->numberBetween($min = 10000000, $max = 99999999),
            'alamat'=>$this->faker->address(),
            'jk'=>$this->faker->randomElement(['male', 'female']),
            'no_telp'=>$this->faker->unique()->tollFreePhoneNumber(),
            'kelas_id'=>Kelas::all()->random()->id
            //
        ];
    }
}
