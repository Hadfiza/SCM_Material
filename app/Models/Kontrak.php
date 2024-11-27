<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'kontrak';

    // Tentukan kolom yang dapat diisi (mass assignment)
    protected $fillable = [
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'bukti_kontrak',
        'user_id', // Pastikan ini ada untuk relasi ke User (jika relasi ke pengguna disiapkan)
    ];

    // Relasi dengan model Pemasok (hasMany)
    public function pemasok()
    {
        return $this->hasMany(Pemasok::class, 'kontrak_id');
    }

    // Relasi dengan model User (belongsTo)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
