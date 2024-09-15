<?php

namespace App\Http\Resources;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PegawaiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            'nik' => $this->nik,
            'username' => $this->user ? $this->user->username : null,
            'id_jabatan' => $this->id_jabatan,
            'jabatan' => Jabatan::find($this->id_jabatan)->jabatan,
            'nama_pegawai' => $this->nama_pegawai,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'nomer_telepon' => $this->nomer_telepon,
            'status' => $this->status,
            'pendidikan' => $this->pendidikan,
            'alamat' => $this->alamat,
        ];
    }
}
