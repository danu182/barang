<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prosesor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'barang_id',
        'tipeProsesor_id',
        'kapasitas',
        'keterangan',
    ];


    public function barang()
    {
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }


    public function tipeProsesor()
    {
        return $this->hasOne(TipeProcesor::class, 'id', 'tipeProsesor_id');
    }


}
