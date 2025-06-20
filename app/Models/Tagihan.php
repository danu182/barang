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
        'noTagihan',
        'upTagihan',
        'tanggalTagihan',
        'dueDateTagihan',
        'periodeTagihan',
        'totaltagihan',

        'picUser',
        'picAlamat',
        'picTlp',
        'picEmail',
        'statusTagihan',

        'lampiran',
        'keterangan'
    ];


    public function vendor()
    {
        return $this->hasOne(Vendor::class, 'id', 'vendor_id');
    }


    public function tagihanDetail()
    {
        return $this->hasMany(TagihanDetail::class, 'tagihan_id', 'id');
    }


}
