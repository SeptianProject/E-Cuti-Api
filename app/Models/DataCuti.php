<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataCuti extends Model
{
    use HasFactory;
    protected $table = 'data_cutis';
    protected $primaryKey = 'id_cuti';
    public $timestamps = false;

    protected $fillable = [
        'nik',
        'id_jabatan',
        'nama_pegawai',
        'mulai_cuti',
        'akhir_cuti',
        'id_jenis_cuti',
        'jumlah_cuti',
        'sisa_cuti',
        'keterangan',
        'status_cuti',
        'tgl_updated_status'
    ];

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(DataPegawai::class, 'nik', 'nik');
    }

    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }

    public function jenisCuti(): HasMany
    {
        return $this->hasMany(DataJenisCuti::class, 'id_jenis_cuti', 'id_jenis_cuti');
    }
}
