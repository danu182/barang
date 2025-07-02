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
    ];


    public function barang()
    {
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }


    public function tipeRam()
    {
        return $this->belongsTo(User::class, 'id', 'tipeRam_id');
    }


    /**
     * Get the user that owns the Ram
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    // }

}
