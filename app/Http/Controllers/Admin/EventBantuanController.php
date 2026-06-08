<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\EventBantuan; // SESUAIKAN DENGAN MODEL KAMU

class EventBantuanController extends Controller
{
    public function index()
    {
        $events = EventBantuan::latest()->get();
        return view('admin.event.index', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('event', 'public');
        }

        EventBantuan::create([
            'nama_event' => $request->nama_event,
            'tanggal_event' => $request->tanggal_event,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'status' => $request->status ?? 'Tidak Aktif',
        ]);

        return redirect()->back()->with('success', 'Event berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $event = EventBantuan::findOrFail($id);

        $fotoPath = $event->foto;

        if ($request->hasFile('foto')) {
            if ($event->foto) {
                Storage::disk('public')->delete($event->foto);
            }

            $fotoPath = $request->file('foto')->store('event', 'public');
        }

        $event->update([
            'nama_event' => $request->nama_event,
            'tanggal_event' => $request->tanggal_event,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Event berhasil diupdate');
    }

    public function destroy($id)
    {
        $event = EventBantuan::findOrFail($id);

        if ($event->foto) {
            Storage::disk('public')->delete($event->foto);
        }

        $event->delete();

        return redirect()->back()->with('success', 'Event berhasil dihapus');
    }
}