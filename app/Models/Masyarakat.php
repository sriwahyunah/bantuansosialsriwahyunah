<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    /*
    |--------------------------------------------------------------------------
    | TABLE
    |--------------------------------------------------------------------------
    */

    protected $table = 'masyarakats';

    /*
    |--------------------------------------------------------------------------
    | FILLABLE
    |--------------------------------------------------------------------------
    */

    protected $fillable = [

        'nik',

        'nama',

        'alamat',

        'pekerjaan',

        'gaji',

        'total_harta',

        'jumlah_kendaraan',

        'status_rumah',

        'status_kelayakan',

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

    public function penyalurans()
    {
        return $this->hasMany(Penyaluran::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
