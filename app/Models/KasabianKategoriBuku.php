<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KasabianKategoriBuku extends Model
{
    public $fillable = [
        'kasabianNamaKategori',
    ];

    protected $primaryKey = 'kategoriId';
    protected $table = 'kasabian_kategori_buku';


    public function relasi()
    {
        return $this->hasMany(KasabianKategoriBukuRelasi::class, 'kategoriId','kategoriId');
    }
}
