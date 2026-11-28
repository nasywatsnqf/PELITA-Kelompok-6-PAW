<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Laporan extends Model
{
     protected $table = 'laporans';

    protected $fillable = [
        'user_id',
        'kode_tiket',
        'kategori_insiden',
        'tanggal_kejadian',
        'lokasi',
        'pihak_terlibat',
        'kronologi',
        'preferensi_tindak_lanjut',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'kategori_insiden' => 'array',
            'tanggal_kejadian' => 'date',
        ];
    }

    // Relasi laporan dengan pengguna
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi laporan dengan bukti digital
    public function buktiDigitals(): HasMany
    {
        return $this->hasMany(BuktiDigital::class);
    }
}
