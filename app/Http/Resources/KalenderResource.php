<?php

namespace App\Http\Resources;

use App\Models\DataJenisCuti;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KalenderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_cuti,
            'title' => $this->nama_pegawai . ' - ' . $this->keterangan . ' - ' . DataJenisCuti::find($this->id_jenis_cuti)->jenis_cuti,
            'start' => $this->mulai_cuti,
            'end' => $this->akhir_cuti,
        ];
    }
}
