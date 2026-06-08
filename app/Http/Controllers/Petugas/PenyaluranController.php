<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penyaluran;
use App\Models\Masyarakat;
use App\Models\Bantuan;

class PenyaluranController extends Controller
{
    public function index()
    {
        $penyalurans = Penyaluran::with([
            'masyarakat',
            'bantuan'
        ])->latest()->get();

        return view(
            'petugas.penyaluran.index',
            compact('penyalurans')
        );
    }

    public function create()
    {
        $masyarakats = Masyarakat::all();
        $bantuans = Bantuan::all();

        return view(
            'petugas.penyaluran.create',
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
            'jumlah_disalurkan' => 'required|numeric',
            'tanggal_penyaluran' => 'required|date',
            'status' => 'required'
        ]);

        Penyaluran::create([
            'bantuan_id' => $request->bantuan_id,
            'masyarakat_id' => $request->masyarakat_id,
            'jumlah_disalurkan' => $request->jumlah_disalurkan,
            'tanggal_penyaluran' => $request->tanggal_penyaluran,
            'status' => $request->status
        ]);

        return redirect()
            ->route('penyaluran.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $penyaluran = Penyaluran::with([
            'masyarakat',
            'bantuan'
        ])->findOrFail($id);

        return view(
            'petugas.penyaluran.show',
            compact('penyaluran')
        );
    }

    public function edit($id)
    {
        $penyaluran = Penyaluran::findOrFail($id);

        $masyarakats = Masyarakat::all();
        $bantuans = Bantuan::all();

        return view(
            'petugas.penyaluran.edit',
            compact(
                'penyaluran',
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
            'jumlah_disalurkan' => 'required|numeric',
            'tanggal_penyaluran' => 'required|date',
            'status' => 'required'
        ]);

        $penyaluran = Penyaluran::findOrFail($id);

        $penyaluran->update([
            'bantuan_id' => $request->bantuan_id,
            'masyarakat_id' => $request->masyarakat_id,
            'jumlah_disalurkan' => $request->jumlah_disalurkan,
            'tanggal_penyaluran' => $request->tanggal_penyaluran,
            'status' => $request->status
        ]);

        return redirect()
            ->route('penyaluran.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        Penyaluran::findOrFail($id)->delete();

        return redirect()
            ->route('penyaluran.index')
            ->with('success', 'Data berhasil dihapus');
    }
}