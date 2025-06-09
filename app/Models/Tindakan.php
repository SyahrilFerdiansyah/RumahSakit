<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tindakan',
        'harga',
        'kode_icd',
    ];

    // Relasi: satu tindakan bisa memiliki banyak detail tindakan
    public function detail_tindakans()
    {
        return $this->hasMany(Detail_Tindakan::class);
    }
}
