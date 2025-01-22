<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasabianUlasanBuku extends Model
{
    /** @use HasFactory<\Database\Factories\KasabianUlasanBukuFactory> */
    use HasFactory;

    protected $primaryKey = 'ulasanId';
    protected $table = 'kasabian_ulasan_buku';

    public $fillable = [
        'bukuId',
        'userId',
        'ulasan',
        'rating',
    ];

    public function bukus()
    {
        return $this->belongsTo(Kasabian_book::class, 'bukuId', 'bukuId');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
