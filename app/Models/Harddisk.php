<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Harddisk extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable=[
        'barang_id',
        'tipeHardDisk_id',
        'kapasitas',
    ];


    public function barang()
    {
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }


    public function tipeHardDisk()
    {
        return $this->hasOne(TipeHardDisk::class, 'id', 'tipeHardDisk_id');
    }


}
