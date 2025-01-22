<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasabian_book extends Model
{
    /** @use HasFactory<\Database\Factories\KasabianBookFactory> */
    use HasFactory;

    public $fillable = [
        'kasabianJudul',
        'kasabianPenulis',
        'kasabianPenerbit',
        'kasabianGambar',
        'kasabianTahunTerbit',
    ];

    protected $primaryKey = 'bukuId';


    public function relasi()
    {
        return $this->hasMany(KasabianKategoriBukuRelasi::class, 'bukuId', 'bukuId');
    }

    public function ulasan()
    {
        return $this->hasMany(KasabianUlasanBuku::class, 'bukuId', 'bukuId');
    }

    public function koleksiPribadi()
    {
        return $this->hasMany(KasabianKoleksiPribadi::class, 'bukuId', 'bukuId');
    }

    public function peminjaman()
    {
        return $this->hasMany(KasabianPeminjaman::class, 'bukuId', 'bukuId');
    }
}
