<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{

    protected $fillable = [
        'kegiatan_id',
        'uraian',
        'volume',
        'satuan',
        'harga_satuan',
        'jumlah_total',
    ];
    protected $table = "anggaran";

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }
}
