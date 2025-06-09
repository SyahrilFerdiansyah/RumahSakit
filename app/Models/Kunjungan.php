<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kunjungan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'tanggal',
        'keluhan',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    // Relasi ke Detail Tindakan (One to Many)
    public function detail_tindakans()
    {
        return $this->hasMany(Detail_Tindakan::class, 'kunjungan_id');
    }

    // Jika ingin akses tindakan langsung via detail_tindakans
    public function tindakans()
    {
        return $this->hasManyThrough(
            Tindakan::class,
            Detail_Tindakan::class,
            'kunjungan_id', // Foreign key di detail_tindakan
            'id',           // Foreign key di tindakan
            'id',           // Local key di kunjungan
            'tindakan_id'   // Local key di detail_tindakan
        );
    }
}
