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
    protected $table = 'kasabian_kategori_buku_relasi';



    public function books()
    {
        return $this->hasOne(Kasabian_book::class, 'bukuId', 'bukuId');
    }

    public function kategori()
    {
        return $this->hasOne(KasabianKategoriBuku::class, 'kategoriId', 'kategoriId');
    }
}
