<?php

namespace Database\Factories;

use App\Models\DataJenisCuti;
use App\Models\DataPegawai;
use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataCuti>
 */
class DataCutiFactory extends Factory
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
            'id_jabatan' => Jabatan::factory(),
            'nama_pegawai' => fake()->name(),
            'mulai_cuti' => fake()->date(),
            'akhir_cuti' => fake()->date(),
            'id_jenis_cuti' => DataJenisCuti::factory(),
            'jumlah_cuti' => fake()->randomNumber(2),
            'sisa_cuti' => fake()->randomNumber(1),
            'keterangan' => fake()->sentence(),
            'status_cuti' => fake()->randomElement(['Menunggu', 'Disetujui', 'Ditolak']),
            'tgl_updated_status' => fake()->date(),
        ];
    }
}
