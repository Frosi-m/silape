<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_tanggapan extends Model
{
    use HasFactory;
    protected $table        = 'tb_tanggapan';
    protected $primaryKey   = 'id_tanggapan';
    public $timestamps      = false;

    protected $fillable = [
        'isi_tanggapan',
        'id_petugas',
    ];
}
