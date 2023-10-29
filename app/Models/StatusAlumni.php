<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusAlumni extends Model
{
    use HasFactory;

    protected $table = 'status_alumni';

    protected $fillable = [
        'user_id',
        'status',
        'nama_sekolah',
        'jurusan',
        'nama_perusahaan',
        'posisi',
        'tahun_masuk',
        'tahun_lulus',
        'bukti',
    ];
}
