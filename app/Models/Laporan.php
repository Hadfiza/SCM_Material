<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'tanggal_laporan',
        'file_path',
        'proyek_id',
        'detail_proyek_id',
    ];

    /**
     * Relasi dengan Proyek
     * Menghubungkan laporan dengan proyek terkait
     */
    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    /**
     * Relasi dengan Detail Proyek
     * Menghubungkan laporan dengan detail proyek terkait (jika ada)
     */
    public function detailProyek()
    {
        return $this->belongsTo(DetailProyek::class, 'detail_proyek_id');
    }
}
