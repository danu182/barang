<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kota extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'profinsi_id',
        'namaKota',
        'keteranganKota',
    ];






    public function profinsi()
    {
        return $this->hasOne(Profinsi::class, 'id', 'profinsi_id');
    }

}
