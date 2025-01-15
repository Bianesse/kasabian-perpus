<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KasabianKategoriBuku extends Model
{
    public $fillable = [
        'kasabianNamaKategori',
    ];

    public function relasi()
    {
        return $this->hasMany(KasabianKategoriBukuRelasi::class, 'kategoriId','kategoriId');
    }
}
