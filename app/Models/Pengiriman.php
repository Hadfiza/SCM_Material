<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman'; // Nama tabel di database

    protected $fillable = [
        'material_id',
        'tanggal_kirim',
        'tanggal_selesai',
        'status_pengiriman',
    ];

    // Relasi ke tabel Material
    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    // Relasi ke tabel OrderMaterial
    public function orderMaterials()
    {
        return $this->hasMany(OrderMaterial::class, 'pengiriman_id');
    }
    // app/Models/Pengiriman.php

public function user()
{
    return $this->belongsTo(User::class);
}

}
