<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
            'kategori_id',
            'kodeBaranglama',
            'kodeBarang',
            'namaBarang',
            'merek',
            'model',
            'nomorSeri',
            'tanggalPerolehan',
            'hargaPerolehan',
            'vendor',
            'catatan',
    ];


    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id', 'kategori_id');
    }


    public function ram()
    {
        return $this->hasMany(Ram::class, 'barang_id', 'id');
    }


}
