<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferensiTahun extends Model
{
    use HasFactory;

    protected $table = 'referensi_tahun';

    protected $fillable = [
        'ref_tahun'
    ];
}
