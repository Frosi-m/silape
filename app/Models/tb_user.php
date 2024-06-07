<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class tb_user extends Authenticatable
{
    use HasFactory;
    protected $table        = 'tb_user';
    protected $primaryKey   = 'id_user';

    protected $fillable = [
        'username',
        'nama',
        'id_auth',
        'email',
        'password',
        'alamat',
        'no_tlp',
        'tempat_tanggal_lahir',
    ];
}
