<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BuktiDigital extends Model
{
    protected $table = 'bukti_digitals';

    protected $fillable = [
        'laporan_id',
        'nama_file',
        'path_file',
        'mime_type',
        'ukuran_file',
    ];

    // Relasi bukti digital dengan laporan
    public function laporan(): BelongsTo
    {
        return $this->belongsTo(Laporan::class);
    }
}
