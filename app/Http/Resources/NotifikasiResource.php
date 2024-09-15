<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotifikasiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_notifikasi' => $this->id_notifikasi,
            'nik' => $this->nik,
            'pesan' => $this->pesan,
            'tgl_notifikasi' => $this->tgl_notifikasi,
            'jenis_notifikasi' => $this->jenis_notifikasi,
            'status_notifikasi' => $this->status_notifikasi,
        ];
    }
}
