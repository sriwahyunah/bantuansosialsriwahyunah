<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with('bantuan')
            ->where('masyarakat_id', Auth::id())
            ->latest()
            ->get();

        return view(
            'masyarakat.status.index',
            compact('pengajuans')
        );
    }
}