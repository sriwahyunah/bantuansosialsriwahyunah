<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    protected $table = 'verifikasis';

    protected $fillable = [

        'pengajuan_id',

        'status',

        'catatan',

        'tanggal_verifikasi',

    ];
}