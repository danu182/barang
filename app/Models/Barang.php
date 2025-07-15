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
            'pelanggan_id',
            'kodeBaranglama',
            'kodeBarangAkuntansi',
            'kodeBarang',
            'kodeBarangUse',
            'namaBarang',
            'merek',
            'model',
            'nomorSeri',
            'tanggalPerolehan',
            'hargaPerolehan',
            'vendor',
            'catatan',
    ];


    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class, 'id', 'pelanggan_id');
    }

    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id', 'kategori_id');
    }


    public function ram()
    {
        return $this->hasMany(Ram::class, 'barang_id', 'id');
    }

    public function hd()
    {
        return $this->hasMany(Harddisk::class, 'barang_id', 'id');
    }

    public function prosesor()
    {
        return $this->hasMany(Prosesor::class, 'barang_id', 'id');
    }


    public function assetMutasi()
    {
        return $this->hasMany(AssetMutation::class, 'barang_id', 'id');
    }


}
