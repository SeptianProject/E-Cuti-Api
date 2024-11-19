<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JumlahCutiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $jumlah_cuti_diterima = $this->where('nik', $this->nik)->where('status_cuti', 'Diterima')->sum('jumlah_cuti');
        $jumlah_cuti_ditolak = $this->where('nik', $this->nik)->where('status_cuti', 'Ditolak')->sum('jumlah_cuti');
        $jumlah_cuti_menunggu = $this->where('nik', $this->nik)->where('status_cuti', 'Menunggu')->sum('jumlah_cuti');

        $total_jumlah_cuti =  $this->where('nik', $this->nik)->count('jumlah_cuti');

        return [
            'nik' => $this->nik,
            'jumlah_cuti' => $total_jumlah_cuti,
            'jumlah_cuti_diterima' => $jumlah_cuti_diterima,
            'jumlah_cuti_ditolak' => $jumlah_cuti_ditolak,
            'jumlah_cuti_menunggu' => $jumlah_cuti_menunggu,
        ];
    }
}
