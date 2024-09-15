<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatans';
    protected $primaryKey = 'id_jabatan';
    public $timestamps = false;

    protected $fillable = [
        'jabatan',
    ];

    public function pegawai(): HasOne
    {
        return $this->hasOne(DataPegawai::class, 'id_jabatan', 'id_jabatan');
    }

    public function cuti(): HasOne
    {
        return $this->hasOne(DataCuti::class, 'id_jabatan', 'id_jabatan');
    }
}
