<?php

namespace Database\Factories;

use App\Models\DataPegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => DataPegawai::factory(),
            'username' => fake()->userName(),
            'password' => bcrypt('password'),
            'role' => 'Pegawai',
        ];
    }

    public function admin(): static
    {
        return $this->state(fn(array $attributes) => [
            'role' => 'Admin',
            'password' => bcrypt('admin123')
        ]);
    }

    public function kepala_desa(): static
    {
        return $this->state(fn(array $attributes) => [
            'role' => 'Kepala_desa',
            'password' => bcrypt('kepala_desa123')
        ]);
    }
}
