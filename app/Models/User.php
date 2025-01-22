<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'kasabianUsername',
        'kasabianEmail',
        'password',
        'kasabianRoleId',
        'kasabianNamaLengkap',
        'kasabianAlamat',
    ];

    public function kasabianRoles()
    {
        return $this->belongsTo(Kasabian_role::class, 'kasabianRoleId');
    }

    public function ulasan()
    {
        return $this->hasMany(KasabianUlasanBuku::class, 'userId');
    }

    public function peminjaman()
    {
        return $this->hasMany(KasabianPeminjaman::class, 'userId');
    }

    public function koleksiPribadi()
    {
        return $this->hasMany(KasabianKoleksiPribadi::class, 'userId');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'kasabianPassword' => 'hashed',
        ];
    }
}
