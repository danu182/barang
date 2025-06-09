<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SosmedDetailLogin extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
            'sosmedDetail_id',
            'tanggal',
            'jam',
            'status',
            'gambar',
    ];



    public function sosmedDetail()
    {
        return $this->hasOne(SosmedDetail::class, 'id', 'sosmedDetail_id');
    }

}
