<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasabianPeminjaman extends Model
{
    /** @use HasFactory<\Database\Factories\KasabianPeminjamanFactory> */

    protected $table = 'kasabian_peminjaman';
    protected $primaryKey = 'peminjamanId';

    public function users()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function books()
    {
        return $this->belongsTo(Kasabian_book::class, 'bukuId');
    }

    use HasFactory;
}
