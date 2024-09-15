<?php

namespace App\Http\Resources;

use App\Models\DataJenisCuti;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CutiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_cuti' => $this->id_cuti,
            'nik' => $this->nik,
            'id_jabatan' => $this->id_jabatan,
            'jabatan' => Jabatan::find($this->id_jabatan)->jabatan,
            'nama_pegawai' => $this->nama_pegawai,
            'mulai_cuti' => $this->mulai_cuti,
            'akhir_cuti' => $this->akhir_cuti,
            'id_jenis_cuti' => $this->id_jenis_cuti,
            'jenis_cuti' => DataJenisCuti::find($this->id_jenis_cuti)->jenis_cuti,
            'jumlah_cuti' => $this->jumlah_cuti,
            'sisa_cuti' => $this->sisa_cuti,
            'keterangan' => $this->keterangan,
            'status_cuti' => $this->status_cuti,
            'tgl_updated_status' => $this->tgl_updated_status,
        ];
    }
}
