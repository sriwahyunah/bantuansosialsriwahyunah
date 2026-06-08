<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengambilan;
use App\Models\Masyarakat;
use App\Models\Bantuan;

class PengambilanController extends Controller
{
    public function index()
    {
        $pengambilans = Pengambilan::with([
            'masyarakat',
            'bantuan'
        ])->latest()->get();

        return view(
            'petugas.pengambilan.index',
            compact('pengambilans')
        );
    }

    public function create()
    {
        $masyarakats = Masyarakat::all();
        $bantuans = Bantuan::all();

        return view(
            'petugas.pengambilan.create',
            compact(
                'masyarakats',
                'bantuans'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'bantuan_id' => 'required',
            'masyarakat_id' => 'required',
            'jumlah_diterima' => 'required|numeric',
            'tanggal_pengambilan' => 'required|date',
            'status' => 'required'
        ]);

        Pengambilan::create([
            'bantuan_id' => $request->bantuan_id,
            'masyarakat_id' => $request->masyarakat_id,
            'jumlah_diterima' => $request->jumlah_diterima,
            'tanggal_pengambilan' => $request->tanggal_pengambilan,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('pengambilan.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $pengambilan = Pengambilan::with([
            'masyarakat',
            'bantuan'
        ])->findOrFail($id);

        return view(
            'petugas.pengambilan.show',
            compact('pengambilan')
        );
    }

    public function edit($id)
    {
        $pengambilan = Pengambilan::findOrFail($id);

        $masyarakats = Masyarakat::all();
        $bantuans = Bantuan::all();

        return view(
            'petugas.pengambilan.edit',
            compact(
                'pengambilan',
                'masyarakats',
                'bantuans'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bantuan_id' => 'required',
            'masyarakat_id' => 'required',
            'jumlah_diterima' => 'required|numeric',
            'tanggal_pengambilan' => 'required|date',
            'status' => 'required'
        ]);

        $pengambilan = Pengambilan::findOrFail($id);

        $pengambilan->update([
            'bantuan_id' => $request->bantuan_id,
            'masyarakat_id' => $request->masyarakat_id,
            'jumlah_diterima' => $request->jumlah_diterima,
            'tanggal_pengambilan' => $request->tanggal_pengambilan,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('pengambilan.index')
            ->with('success', 'Data berhasil diperbarui');
    }


    public function destroy($id)
    {
        Pengambilan::findOrFail($id)->delete();

        return redirect()
            ->route('pengambilan.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
