<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public $timestamps = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // protected function createdAt(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn(mixed $value) => Carbon::parse($value)->formatLocalized('%d-%b-%Y')
    //     );
    // }
}
