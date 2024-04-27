<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_laporan extends Model
{
    use HasFactory;
    protected $table        = 'tb_laporan';
    protected $primaryKey   = 'id_laporan';

    protected $fillable = [
        'isi_laporan',
        'id_pelapor',
    ];
}
