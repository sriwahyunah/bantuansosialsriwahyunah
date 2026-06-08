<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Masyarakat;
use App\Models\Bantuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with([
            'masyarakat',
            'bantuan'
        ])->get();

        return view('admin.pengajuan.index', compact('pengajuans'));
    }

    public function create()
    {
        $masyarakats = Masyarakat::all();
        $bantuans = Bantuan::all();

        return view('admin.pengajuan.create', compact(
            'masyarakats',
            'bantuans'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'masyarakat_id' => 'required',
            'bantuan_id' => 'required',
            'tanggal_pengajuan' => 'required',
            'status' => 'required'
        ]);

        Pengajuan::create($request->all());

        return redirect('/admin/pengajuan')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::with([
            'masyarakat',
            'bantuan'
        ])->findOrFail($id);

        return view('admin.pengajuan.show', compact('pengajuan'));
    }

    public function edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        $masyarakats = Masyarakat::all();
        $bantuans = Bantuan::all();

        return view('admin.pengajuan.edit', compact(
            'pengajuan',
            'masyarakats',
            'bantuans'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'masyarakat_id' => 'required',
            'bantuan_id' => 'required',
            'tanggal_pengajuan' => 'required',
            'status' => 'required'
        ]);

        $pengajuan = Pengajuan::findOrFail($id);

        $pengajuan->update($request->all());

        return redirect('/admin/pengajuan')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Pengajuan::findOrFail($id)->delete();

        return redirect('/admin/pengajuan')
            ->with('success', 'Data berhasil dihapus');
    }
}