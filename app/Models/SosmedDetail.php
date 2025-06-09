<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SosmedDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'sosmed_id',
        'username',
        'email',
        'password',
        'link',
        'pemilik',
        'pic',
        'bagian',
        'keterangan',
    ];



     protected static function boot()
    {
        parent::boot();

        static::deleting(function ($sosmedDetailLogin) {
            if ($sosmedDetailLogin->sosmeddetaillogin()->count() > 0) {
                throw new \Exception(" karena data sudah ada hubungan dengan tabel lain (data bukti login).");
            }
        });
    }


/**
 * Get the user associated with the SosmedDetail
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function sosmed()
{
    return $this->hasOne(Sosmed::class, 'id', 'sosmed_id');
}



public function sosmeddetaillogin()
{
    return $this->hasMany(SosmedDetailLogin::class, 'sosmedDetail_id', 'id');
}


}
