<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penyaluran;
use App\Models\Masyarakat;
use App\Models\Bantuan;
use Illuminate\Http\Request;

class PenyaluranController extends Controller
{
    public function index()
    {
        $penyalurans = Penyaluran::with([
            'masyarakat',
            'bantuan'
        ])->latest()->get();

        return view('admin.penyaluran.index', compact('penyalurans'));
    }

    public function create()
    {
        $masyarakats = Masyarakat::all();
        $bantuans = Bantuan::all();

        return view('admin.penyaluran.create', compact(
            'masyarakats',
            'bantuans'
        ));
    }

    public function store(Request $request)
    {
        Penyaluran::create($request->all());

        return redirect()
            ->route('penyaluran.index')
            ->with('success','Penyaluran berhasil ditambah');
    }

    public function show(Penyaluran $penyaluran)
    {
        return view('admin.penyaluran.show', compact('penyaluran'));
    }

    public function edit(Penyaluran $penyaluran)
    {
        $masyarakats = Masyarakat::all();
        $bantuans = Bantuan::all();

        return view('admin.penyaluran.edit', compact(
            'penyaluran',
            'masyarakats',
            'bantuans'
        ));
    }

    public function update(Request $request, Penyaluran $penyaluran)
    {
        $penyaluran->update($request->all());

        return redirect()
            ->route('penyaluran.index')
            ->with('success','Data berhasil diupdate');
    }

    public function destroy(Penyaluran $penyaluran)
    {
        $penyaluran->delete();

        return back()->with('success','Data berhasil dihapus');
    }
}