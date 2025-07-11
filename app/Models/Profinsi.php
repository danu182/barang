<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profinsi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'negara_id',
        'namaProfinsi',
        'keteranganProfinsi',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($profinsi) {
            if ($profinsi->kota()->count() > 0) {
                throw new \Exception(" Tidak dapat dihapus karena sudah terhububg dengan data tabel Kota. Hapus dulu data kota yang berkaitan dengan profinsi yang akan di hapus ");
            }
        });
    }



     public function kota()
     {
         return $this->hasOne(Kota::class, 'profinsi_id', 'id');
     }

}
