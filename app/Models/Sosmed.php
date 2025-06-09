<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sosmed extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'namaSosmed',
        'keterangan',
    ];


    // public static::deleting(function ($kategori) {
    //         if ($kategori->barang()->count() > 0) {
    //             throw new \Exception(" Tidak dapat dihapus karena sudah ada data gedung nya.");
    //         }
    //     });


     protected static function boot()
    {
        parent::boot();

        static::deleting(function ($sosmed) {
            if ($sosmed->sosmedDetail()->count() > 0) {
                throw new \Exception(" karena data sudah ada hubungan dengan tabel lain (data sosmed detail). ");
            }
        });
    }



    public function sosmedDetail()
    {
        return $this->hasMany(SosmedDetail::class, 'sosmed_id', 'id');
    }
}
