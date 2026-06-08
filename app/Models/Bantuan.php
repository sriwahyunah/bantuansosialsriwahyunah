<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    /*
    |--------------------------------------------------------------------------
    | TABLE
    |--------------------------------------------------------------------------
    */

    protected $table = 'bantuans';

    /*
    |--------------------------------------------------------------------------
    | FILLABLE
    |--------------------------------------------------------------------------
    */

    protected $fillable = [

        'nama_bantuan',

        'total_dana',

        'dana_tersisa',

        'kuota_penerima',

        'jumlah_sudah_mengambil',

        'status',

        'deskripsi',

    ];

    /*
    |--------------------------------------------------------------------------
    | CASTS
    |--------------------------------------------------------------------------
    */

    protected $casts = [

        'total_dana' => 'integer',

        'dana_tersisa' => 'integer',

        'kuota_penerima' => 'integer',

        'jumlah_sudah_mengambil' => 'integer',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function pengajuans()
    {
        return $this->hasMany(Pengajuan::class);
    }

    public function pengambilans()
    {
        return $this->hasMany(Pengambilan::class);
    }

    public function penyalurans()
    {
        return $this->hasMany(Penyaluran::class);
    }
}