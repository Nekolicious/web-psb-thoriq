<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CalonSiswa>
 */
class CalonSiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker\Factory::create();
        return [
            'kcs_id' => 1,
            'foto_id' => 1,
            'nodaftar' => $faker->numerify('TEST######'),
            'nama' => $faker->name(),
            'jeniskelamin' => $faker->randomElement(['L','P']),
            'tempatlahir' => $faker->city(),
            'tgllahir' => $faker->dateTime(),
            'agama' => $faker->cityPrefix(),
            'kewarganegaraan' => $faker->state(),
            'alamat' => $faker->address(),
            'status' => 1,
        ];
    }
}
