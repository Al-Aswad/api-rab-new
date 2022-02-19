<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'name',
        'satuan',
        'harga',
    ];

    protected $table = "material";
}
