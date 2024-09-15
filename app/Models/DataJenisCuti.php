<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataJenisCuti extends Model
{
    use HasFactory;
    protected $table = 'data_jenis_cutis';
    protected $primaryKey = 'id_jenis_cuti';
    public $timestamps = false;
    protected $fillable = [
        'jenis_cuti'
    ];

    public function cuti(): BelongsTo
    {
        return $this->belongsTo(DataCuti::class, 'id_jenis_cuti', 'id_jenis_cuti');
    }
}
