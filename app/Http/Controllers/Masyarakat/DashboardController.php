<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Bantuan;
use App\Models\EventBantuan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalPengajuan = Pengajuan::where(
            'masyarakat_id',
            $user->id
        )->count();

        $disetujui = Pengajuan::where(
            'masyarakat_id',
            $user->id
        )->where('status', 'disetujui')
         ->count();

        $menunggu = Pengajuan::where(
            'masyarakat_id',
            $user->id
        )->where('status', 'menunggu')
         ->count();

        // Event yang akan datang atau sedang berlangsung
        $eventAktif = EventBantuan::whereIn('status', [
                'akan_datang',
                'berlangsung'
            ])->count();

        $pengajuanTerbaru = Pengajuan::with('bantuan')
            ->where('masyarakat_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        $bantuanAktif = Bantuan::where('status', 'aktif')
            ->latest()
            ->take(5)
            ->get();

        $eventTerbaru = EventBantuan::whereIn('status', [
                'akan_datang',
                'berlangsung'
            ])
            ->orderBy('tanggal_mulai', 'asc')
            ->take(5)
            ->get();

        return view('masyarakat.dashboard', compact(
            'totalPengajuan',
            'disetujui',
            'menunggu',
            'eventAktif',
            'pengajuanTerbaru',
            'bantuanAktif',
            'eventTerbaru'
        ));
    }
}