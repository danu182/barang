<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tagihan extends Model
{
    use HasFactory, SoftDeletes ;


    protected $fillable=[
        'vendor_id',
        'noTagihan',
        'upTagihan',
        'tanggalTagihan',
        'dueDateTagihan',
        'totaltagihan',
        'lampiran',
        'keterangan'
    ];


    public function vendor()
    {
        return $this->hasOne(Vendor::class, 'id', 'vendor_id');
    }


}
