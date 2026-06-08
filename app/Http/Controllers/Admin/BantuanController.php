<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bantuan;
use Illuminate\Http\Request;

class BantuanController extends Controller
{
    public function index()
    {
        $bantuans = Bantuan::latest()->get();

        return view(
            'admin.bantuan.index',
            compact('bantuans')
        );
    }

    public function create()
    {
        return view('admin.bantuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bantuan' => 'required',
            'total_dana' => 'required|numeric',
            'kuota' => 'required|numeric',
            'status' => 'required'
        ]);

        Bantuan::create([
            'nama_bantuan' => $request->nama_bantuan,
            'total_dana' => $request->total_dana,
            'dana_tersisa' => $request->total_dana,
            'kuota' => $request->kuota,
            'sudah_mengambil' => 0,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('admin.bantuan.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $bantuan = Bantuan::findOrFail($id);

        return view(
            'admin.bantuan.edit',
            compact('bantuan')
        );
    }

    public function update(Request $request, $id)
    {
        $bantuan = Bantuan::findOrFail($id);

        $request->validate([
            'nama_bantuan' => 'required',
            'total_dana' => 'required',
            'kuota' => 'required'
        ]);

        $bantuan->update([
            'nama_bantuan' => $request->nama_bantuan,
            'total_dana' => $request->total_dana,
            'kuota' => $request->kuota,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('admin.bantuan.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Bantuan::findOrFail($id)->delete();

        return redirect()
            ->route('admin.bantuan.index')
            ->with('success', 'Data berhasil dihapus');
    }
}