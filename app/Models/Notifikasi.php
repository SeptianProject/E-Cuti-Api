<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notifikasi extends Model
{
    use HasFactory;
    protected $table = 'notifikasis';
    protected $primaryKey = 'id_notifikasi';
    public $timestamps = false;

    protected $fillable = [
        'nik',
        'pesan',
        'tgl_notifikasi',
        'jenis_notifikasi',
        'status_notifikasi'
    ];


    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(DataPegawai::class, 'nik', 'nik');
    }
}
