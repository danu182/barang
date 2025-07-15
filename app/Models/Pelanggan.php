<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'kodePelanggan',
        'namaPelanggan',
        'picPelanggan',
        'tLpPelanggan',
        'alamatPelanggan',
        'emailPelanggan',
        'keteranganPelanggan',
    ];


    public function barang()
    {
        return $this->hasMany(Barang::class, 'pelanggan_id', 'id');
    }
}
