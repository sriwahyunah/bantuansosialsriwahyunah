<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Pengambilan;
use App\Models\Penyaluran;
use App\Models\EventBantuan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPengambilan = Pengambilan::count();
        $totalPenyaluran = Penyaluran::count();
        $totalEventBantuan = EventBantuan::count();

        return view('petugas.dashboard', compact(
            'totalPengambilan',
            'totalPenyaluran',
            'totalEventBantuan'
        ));
    }
}