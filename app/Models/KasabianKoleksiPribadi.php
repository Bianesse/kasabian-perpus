<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasabianKoleksiPribadi extends Model
{
    /** @use HasFactory<\Database\Factories\KasabianKoleksiPribadiFactory> */
    use HasFactory;

    protected $primaryKey = 'koleksiId';
    protected $table = 'kasabian_koleksi_pribadi';

    public $fillable = [
        'userId', 'bukuId',
    ];


    public function users()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function books()
    {
        return $this->belongsTo(Kasabian_book::class, 'bukuId', 'bukuId');
    }
}
