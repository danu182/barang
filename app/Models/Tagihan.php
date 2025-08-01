<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tagihan extends Model
{
    use HasFactory, SoftDeletes ;


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($tagihan) {
            if ($tagihan->tagihanDetail()->count() > 0) {
                throw new \Exception(" Tidak dapat dihapus karena sudah terhububg dengan data tabel yang lain .");
            }
        });
    }


    protected $fillable=[
            'vendor_id',
            'pelanggan_id',

            'noTagihan',
            'tanggalTagihan',
            'dueDateTagihan',
            'periodeTagihan',
            'totaltagihan',
            'statusTagihan_id',

            'keterangan',
            'lampiran',
    ];


    public function vendor()
    {
        return $this->hasOne(Vendor::class, 'id', 'vendor_id');
    }

    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class, 'id', 'pelanggan_id');
    }

    public function detailTagihan()
    {
        return $this->hasMany(TagihanDetail::class, 'tagihan_id', 'id');
    }



   public function comments()
   {
       return $this->hasMany(StatusTagihan::class, 'id', 'statusTagihan_id');
   }

}
