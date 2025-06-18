<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagihanDetail extends Model
{
    use HasFactory, SoftDeletes ;


    protected $fillable=[
        'tagihan_id',
        'namaItem',
        'jumlah',
        'hargaSatuan',
        'subtotal'
    ];
}
