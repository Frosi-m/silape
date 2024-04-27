<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class detail_laporan_u extends Model
{
    use HasFactory;
    protected $table        = 'detail_laporan';
    protected $primaryKey   = 'id_detail_laporan';
    public $timestamps   = false;

    protected $fillable = [
        'jenis_laporan',
        'tgl_laporan',
        'status_laporan',
        'id_pelaporan',
    ];
}
