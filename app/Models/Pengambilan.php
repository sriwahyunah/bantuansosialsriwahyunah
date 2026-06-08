<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    protected $table = 'pengambilans';

    protected $fillable = [
        'bantuan_id',
        'masyarakat_id',
        'jumlah_diterima',
        'tanggal_pengambilan',
        'status'
    ];

    public function bantuan()
    {
        return $this->belongsTo(Bantuan::class, 'bantuan_id');
    }

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id');
    }
}