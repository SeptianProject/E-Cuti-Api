<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DataCuti;
use App\Models\DataPegawai;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $pegawais = DataPegawai::factory(10)->create();

        foreach ($pegawais as $key => $pegawai) {
            if ($key === 0) {
                User::factory()->admin()->create(['nik' => $pegawai->nik]);
                User::factory()->kepala_desa()->create(['nik' => $pegawai->nik]);
            } else {
                User::factory()->create(['nik' => $pegawai->nik]);
            }
            DataCuti::factory()->create(['nik' => $pegawai->nik, 'id_jabatan' => $pegawai->id_jabatan]);
        }
    }
}
