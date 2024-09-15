<?php

namespace Database\Factories;

use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataPegawai>
 */
class DataPegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => fake()->randomNumber(8),
            'id_jabatan' => Jabatan::factory(),
            'nama_pegawai' => fake()->name(),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date(),
            'jenis_kelamin' => fake()->randomElement(['L', 'P']),
            'nomer_telepon' => fake()->e164PhoneNumber(),
            'status' => fake()->randomElement(['Aktif', 'Tidak Aktif']),
            'pendidikan' => fake()->randomElement(['SMA', 'D3', 'S1', 'S2']),
            'alamat' => fake()->address(),
        ];
    }
}
