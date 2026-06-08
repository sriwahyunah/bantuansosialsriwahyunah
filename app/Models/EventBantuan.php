<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventBantuan extends Model
{
    protected $table = 'event_bantuans';

    protected $fillable = [
        'nama_event',
        'deskripsi',
        'lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'jenis_bantuan',
        'kuota',
        'peserta',
        'foto',
        'status',
    ];

    protected $casts = [
        'tanggal_mulai'   => 'date',
        'tanggal_selesai' => 'date',
    ];
}