<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakats = Masyarakat::latest()
            ->paginate(10);

        return view(
            'admin.masyarakat.index',
            compact('masyarakats')
        );
    }
    public function create()
    {
        return view('admin.masyarakat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:masyarakats',
            'nama' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'gaji' => 'required|numeric',
            'total_harta' => 'required|numeric',
            'jumlah_kendaraan' => 'required|numeric',
            'status_rumah' => 'required',
        ]);

        $status = (
            $request->gaji <= 2000000 &&
            $request->total_harta <= 20000000 &&
            $request->jumlah_kendaraan <= 1
        )
        ? 'Layak'
        : 'Tidak Layak';

        Masyarakat::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'gaji' => $request->gaji,
            'total_harta' => $request->total_harta,
            'jumlah_kendaraan' => $request->jumlah_kendaraan,
            'status_rumah' => $request->status_rumah,
            'status_kelayakan' => $status,
        ]);

        return redirect()
            ->route('admin.masyarakat.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $masyarakat = Masyarakat::findOrFail($id);

        return view(
            'admin.masyarakat.show',
            compact('masyarakat')
        );
    }

    public function edit($id)
    {
        $masyarakat = Masyarakat::findOrFail($id);

        return view(
            'admin.masyarakat.edit',
            compact('masyarakat')
        );
    }

    public function update(Request $request, $id)
    {
        $masyarakat = Masyarakat::findOrFail($id);

        $request->validate([
            'nik' => 'required|unique:masyarakats,nik,' . $id,
            'nama' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'gaji' => 'required|numeric',
            'total_harta' => 'required|numeric',
            'jumlah_kendaraan' => 'required|numeric',
            'status_rumah' => 'required',
        ]);

        $status = (
            $request->gaji <= 2000000 &&
            $request->total_harta <= 20000000 &&
            $request->jumlah_kendaraan <= 1
        )
        ? 'Layak'
        : 'Tidak Layak';

        $masyarakat->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'gaji' => $request->gaji,
            'total_harta' => $request->total_harta,
            'jumlah_kendaraan' => $request->jumlah_kendaraan,
            'status_rumah' => $request->status_rumah,
            'status_kelayakan' => $status,
        ]);

        return redirect()
            ->route('admin.masyarakat.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        Masyarakat::findOrFail($id)->delete();

        return redirect()
            ->route('admin.masyarakat.index')
            ->with('success', 'Data berhasil dihapus');
    }
}