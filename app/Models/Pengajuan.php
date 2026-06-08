<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $fillable = [
        'masyarakat_id',
        'bantuan_id',
        'status',
        'layak',
        'tanggal_pengajuan',
        'tanggal_disetujui',
        'tanggal_pengambilan',
        'catatan_admin',
    ];

    const STATUS_MENUNGGU = 'menunggu';
    const STATUS_DITERIMA = 'diterima';
    const STATUS_DITOLAK = 'ditolak';
    const STATUS_SUDAH_DIAMBIL = 'sudah_diambil';

 public function bantuan()
    {
        return $this->belongsTo(Bantuan::class, 'bantuan_id');
    }

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id');
    }

}