<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Bantuan;
use App\Models\EventBantuan;
use App\Models\Laporan;
use App\Models\Masyarakat;
use App\Models\Pengajuan;
use App\Models\Pengambilan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | COUNT DATA
        |--------------------------------------------------------------------------
        */

        $totalBantuan = Bantuan::count();

        $totalEvent = EventBantuan::count();

        $totalMasyarakat = Masyarakat::count();

        $totalPengajuan = Pengajuan::count();

        $totalPengambilan = Pengambilan::count();

        $totalUser = User::count();

        $totalLaporan = Laporan::count();

        /*
        |--------------------------------------------------------------------------
        | DATA TERBARU
        |--------------------------------------------------------------------------
        */

        $pengajuanTerbaru = Pengajuan::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalBantuan',
            'totalEvent',
            'totalMasyarakat',
            'totalPengajuan',
            'totalPengambilan',
            'totalUser',
            'totalLaporan',
            'pengajuanTerbaru'
        ));
    }
}