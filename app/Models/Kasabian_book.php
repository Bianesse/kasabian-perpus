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
        'kasabianTahunTerbit',
    ];

    public function relasi()
    {
        return $this->hasMany(KasabianKategoriBukuRelasi::class, 'bukuId', 'bukuId');
    }
}
