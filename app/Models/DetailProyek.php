<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProyek extends Model
{
    use HasFactory;

    protected $table = 'detail_proyek';

    protected $fillable = [
        'proyek_id',
        'deskripsi_pekerjaan',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }
}
