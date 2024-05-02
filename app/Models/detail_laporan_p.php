<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class detail_laporan_p  extends Model
{
    use HasFactory;
    protected $table        = 'detail_laporan';
    protected $primaryKey   = 'id_detail_laporan';
    public $timestamps      = false;

    protected $fillable = [
        'tgl_tanggapan',
        'status_laporan',
        'id_umpan_balik',
    ];
}