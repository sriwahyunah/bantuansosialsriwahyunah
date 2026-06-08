<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengambilan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

class PengambilanController extends Controller
{
    public function index()
    {
        $pengambilans = Pengambilan::with('masyarakat')
                        ->latest()
                        ->get();

        return view('admin.pengambilan.index', compact('pengambilans'));
    }

    public function create()
    {
        $masyarakats = Masyarakat::all();

        return view('admin.pengambilan.create', compact('masyarakats'));
    }

    public function store(Request $request)
    {
        Pengambilan::create($request->all());

        return redirect()
            ->route('pengambilan.index')
            ->with('success','Data berhasil ditambah');
    }

    public function show(Pengambilan $pengambilan)
    {
        return view('admin.pengambilan.show', compact('pengambilan'));
    }

    public function edit(Pengambilan $pengambilan)
    {
        $masyarakats = Masyarakat::all();

        return view('admin.pengambilan.edit', compact(
            'pengambilan',
            'masyarakats'
        ));
    }

    public function update(Request $request, Pengambilan $pengambilan)
    {
        $pengambilan->update($request->all());

        return redirect()
            ->route('pengambilan.index')
            ->with('success','Data berhasil diupdate');
    }

    public function destroy(Pengambilan $pengambilan)
    {
        $pengambilan->delete();

        return back()->with('success','Data berhasil dihapus');
    }
}