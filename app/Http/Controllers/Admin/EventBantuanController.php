<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventBantuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventBantuanController extends Controller
{
    public function index()
    {
        $events = EventBantuan::latest()
            ->paginate(10);

        return view(
            'admin.event.index',
            compact('events')
        );
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'nama_event' => 'required',
            'tanggal_event' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        $foto = null;

        if ($request->hasFile('foto')) {

            $foto = $request
                ->file('foto')
                ->store('event', 'public');
        }

        EventBantuan::create([

            'nama_event' => $request->nama_event,
            'tanggal_event' => $request->tanggal_event,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
            'status' => $request->status,

        ]);

        return redirect()
            ->route('admin.event.index')
            ->with(
                'success',
                'Event berhasil ditambahkan'
            );
    }

    public function show($id)
    {
        $event = EventBantuan::findOrFail($id);

        return view(
            'admin.event.show',
            compact('event')
        );
    }

    public function edit($id)
    {
        $event = EventBantuan::findOrFail($id);

        return view(
            'admin.event.edit',
            compact('event')
        );
    }

    public function update(Request $request, $id)
    {
        $event = EventBantuan::findOrFail($id);

        $foto = $event->foto;

        if ($request->hasFile('foto')) {

            if ($event->foto) {

                Storage::disk('public')
                    ->delete($event->foto);
            }

            $foto = $request
                ->file('foto')
                ->store('event', 'public');
        }

        $event->update([

            'nama_event' => $request->nama_event,
            'tanggal_event' => $request->tanggal_event,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
            'status' => $request->status,

        ]);

        return redirect()
            ->route('admin.event.index')
            ->with(
                'success',
                'Event berhasil diperbarui'
            );
    }

    public function destroy($id)
    {
        $event = EventBantuan::findOrFail($id);

        if ($event->foto) {

            Storage::disk('public')
                ->delete($event->foto);
        }

        $event->delete();

        return redirect()
            ->route('admin.event.index')
            ->with(
                'success',
                'Event berhasil dihapus'
            );
    }
}