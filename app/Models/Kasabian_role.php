<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kasabian_role extends Model
{
    protected $fillable = [
        'kasabianRoleName'
    ];

    public function kasabianUsers()
    {
        return $this->hasMany(User::class, 'kasabianRoleId');
    }
}
