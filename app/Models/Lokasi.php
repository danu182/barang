<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lokasi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'kota_id',
        'namaLokasi',
        'lantai',
        'keterangan',
    ];


    public function kota()
    {
        return $this->hasOne(Kota::class, 'id', 'kota_id');
    }

}
