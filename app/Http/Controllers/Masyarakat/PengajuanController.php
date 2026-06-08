<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Bantuan;
use App\Models\Masyarakat;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function index()
    {
        // FIX: pakai user login (bukan first())
        $user = Auth::user();

        $masyarakat = $user?->masyarakat;

        if (!$masyarakat) {
            return view('masyarakat.pengajuan.index', [
                'pengajuans' => collect(),
                'bantuans' => collect()
            ]);
        }

        $pengajuans = Pengajuan::with('bantuan')
            ->where('masyarakat_id', $masyarakat->id)
            ->latest()
            ->get();

        $bantuans = Bantuan::all();

        return view('masyarakat.pengajuan.index', compact(
            'pengajuans',
            'bantuans'
        ));
    }

    public function create()
    {
        $bantuans = Bantuan::all();

        return view('masyarakat.pengajuan.create', compact('bantuans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bantuan_id' => 'required|exists:bantuans,id'
        ]);

        // FIX: pakai auth user
        $user = Auth::user();
        $masyarakat = $user?->masyarakat;

        if (!$masyarakat) {
            return back()->with('error', 'Data masyarakat tidak ditemukan');
        }

        $layak = $masyarakat->status_kelayakan === 'Layak';

        Pengajuan::create([
            'masyarakat_id'     => $masyarakat->id,
            'bantuan_id'        => $request->bantuan_id,

            // FIX ENUM (harus sesuai database)
            'status'            => Pengajuan::STATUS_MENUNGGU ?? 'menunggu',

            'layak'             => $layak,
            'tanggal_pengajuan' => now(),
        ]);

        return redirect()
            ->route('masyarakat.pengajuan.index')
            ->with('success', 'Pengajuan berhasil dikirim');
    }

    public function show($id)
    {
        $user = Auth::user();
        $masyarakat = $user?->masyarakat;

        $pengajuan = Pengajuan::with('bantuan')
            ->where('masyarakat_id', $masyarakat->id ?? 0)
            ->findOrFail($id);

        return view('masyarakat.pengajuan.show', compact('pengajuan'));
    }
}