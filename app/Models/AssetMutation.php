<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetMutation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'barang_id',
        'old_location_id',
        'new_location_id',
        'mutation_date',
        'mutation_type_id',
        'kondisi_id',
        // 'kota_id',
        'bagian_id',
        'notes',
        'user_id',

    ];



    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function mutationType()
    {
        return $this->hasOne(User::class, 'id', 'mutation_type_id');
    }

    public function kondisi()
    {
        return $this->hasOne(Kondisi::class, 'id', 'kondisi_id');
    }

    public function bagian()
    {
        return $this->hasOne(bagian::class, 'id', 'bagian_id');
    }

}
