<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyaluran extends Model
{
    protected $table = 'penyalurans';

    protected $fillable = [

        'bantuan_id',

        'masyarakat_id',

        'jumlah_disalurkan',

        'tanggal_penyaluran',

        'status',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function bantuan()
    {
        return $this->belongsTo(Bantuan::class);
    }

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class);
    }
}
