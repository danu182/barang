<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ram extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable=[
            'barang_id',
            'tipeRam_id',
            'kapasitas',
            'keterangan',
            'satuanSize_id',
    ];


    public function barang()
    {
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }

    public function satuanSize()
    {
        return $this->hasOne(SatuanSize::class, 'id', 'satuanSize_id');
    }


    public function tipeRam()
    {
        return $this->belongsTo(tipeRam::class, 'tipeRam_id', 'id');
    }





}
