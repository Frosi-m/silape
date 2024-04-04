<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class tb_pa extends Authenticatable
{
    use HasFactory;
    protected $table = 'tb_pa';
    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'jabatan',
        'password',
        'alamat',
    ];
}
