<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'kodeKategori',
        'namaKategori',
        'spesifikasi',
    ];


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($kategori) {
            if ($kategori->barang()->count() > 0) {
                throw new \Exception(" Tidak dapat dihapus karena sudah terhububg dengan data tabel yang lain .");
            }
        });
    }




    public function barang()
    {
        return $this->hasMany(Barang::class, 'kategori_id', 'id');
    }


}
