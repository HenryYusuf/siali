<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = 'lowongan';

    protected $fillable = [
        'user_id',
        'nama_lowongan',
        'nama_perusahaan',
        'lokasi',
        'foto_brosur',
        'posisi',
        'gaji',
        'email',
        'deskripsi',
    ];
}
