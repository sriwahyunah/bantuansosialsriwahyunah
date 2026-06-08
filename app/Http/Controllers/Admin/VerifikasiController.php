<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Verifikasi;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::latest()->get();

        return view('admin.verifikasi.index', compact('pengajuans'));
    }

    public function store(Request $request)
    {
        // VALIDASI WAJIB (INI PENTING)
        $request->validate([
            'pengajuan_id' => 'required|exists:pengajuans,id',
            'status' => 'required',
            'catatan' => 'nullable',
        ]);

        // AMBIL DATA PENGAJUAN (AMAN)
        $pengajuan = Pengajuan::findOrFail($request->pengajuan_id);

        // CEK kalau sudah diverifikasi (opsional tapi bagus)
        $sudahVerifikasi = Verifikasi::where('pengajuan_id', $pengajuan->id)->first();
        if ($sudahVerifikasi) {
            return redirect()->back()->with('error', 'Pengajuan sudah diverifikasi!');
        }

        // SIMPAN DATA VERIFIKASI
        Verifikasi::create([
            'pengajuan_id' => $pengajuan->id,
            'status' => $request->status,
            'catatan' => $request->catatan,
            'tanggal_verifikasi' => now(),
        ]);

        return redirect()->back()->with('success', 'Verifikasi berhasil disimpan');
    }
}