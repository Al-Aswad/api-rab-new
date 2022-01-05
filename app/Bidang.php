<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{


    protected $fillable = [
        'nama_bidang',
    ];

    public function bidang()
    {
        return $this->hasMany(Kegiatan::class);
    }

    protected $table = "bidang";
}
