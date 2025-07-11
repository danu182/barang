<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Negara extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
         'namaNegara',
        'keteranganNegara',
    ];



    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($negara) {
            if ($negara->profinsi()->count() > 0) {
                throw new \Exception(" Tidak dapat dihapus karena sudah terhububg dengan data tabel profinsi. Hapus dulu data profinsi yang berkaitan dengan negara yang akan di hapus ");
            }
        });
    }


     public function profinsi()
    {
        return $this->hasMany(Profinsi::class, 'negara_id', 'id');
    }


}
