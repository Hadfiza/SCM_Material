<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMaterial extends Model
{
    use HasFactory;

    protected $table = 'order_material'; // Nama tabel di database

    protected $fillable = [
        'id_material',
        'pengiriman_id',
        'jumlah_order',
        'tanggal_order',
        'status_order',
        'keterangan',
    ];

    // Relasi ke tabel Material
    public function material()
    {
        return $this->belongsTo(Material::class, 'id_material');
    }

    // Relasi ke tabel Pengiriman
    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class, 'pengiriman_id');
    }
}
