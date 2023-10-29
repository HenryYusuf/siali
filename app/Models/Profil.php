<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profil extends Model
{
    use HasFactory;

    protected $table = 'profil';

    protected $fillable = [
        'user_id',
        'nisn',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'no_ijazah',
        'no_hp',
        'is_validate',
        'deskripsi_is_validate',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
