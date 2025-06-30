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


    public function negara()
    {
        return $this->hasOne(Negara::class, 'negara_id', 'id');
    }
}
