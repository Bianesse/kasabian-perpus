<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasabianKategoriBukuRelasi extends Model
{
    /** @use HasFactory<\Database\Factories\KasabianKategoriBukuRelasiFactory> */
    use HasFactory;

    public $fillable = [
        'bukuId',
        'kategoriId',
    ];

    protected $primaryKey = 'kategoriBukuId';


    public function books()
    {
        return $this->hasMany(Kasabian_book::class, 'bukuId', 'bukuId');
    }

    public function kategori()
    {
        return $this->hasMany(KasabianKategoriBuku::class, 'kategoriId', 'kategoriId');
    }
}
