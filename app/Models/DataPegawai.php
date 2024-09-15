<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DataPegawai extends Model
{
    use HasFactory;

    protected $table = 'data_pegawais';
    protected $primaryKey = 'nik';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nik',
        'id_jabatan',
        'nama_pegawai',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'nomer_telepon',
        'status',
        'pendidikan',
        'alamat'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'nik', 'nik');
    }

    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }

    public function cutis(): HasMany
    {
        return $this->hasMany(DataCuti::class, 'nik', 'nik');
    }
}
