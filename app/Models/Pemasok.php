<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    protected $table = 'pemasok';

    protected $fillable = [
        'nama_pemasok',
        'alamat',
        'kontak',
        'kontrak_id',
        'rating_pemasok',
    ];

    // Relasi ke Kontrak
    public function kontrak()
    {
        return $this->belongsTo(Kontrak::class, 'kontrak_id');
    }
}
