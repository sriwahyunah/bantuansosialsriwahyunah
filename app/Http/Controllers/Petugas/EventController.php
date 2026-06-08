<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\EventBantuan;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = EventBantuan::latest()->get();

        return view('petugas.event.index', compact('events'));
    }

    public function create()
    {
        return view('petugas.event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required'
        ]);

        EventBantuan::create([
            'nama_event' => $request->nama_event
        ]);

        return redirect()
            ->route('petugas.event.index')
            ->with('success', 'Event berhasil ditambahkan');
    }

    public function show($id)
    {
        $event = EventBantuan::findOrFail($id);

        return view('petugas.event.detail', compact('event'));
    }

    public function edit($id)
    {
        $event = EventBantuan::findOrFail($id);

        return view('petugas.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_event' => 'required'
        ]);

        $event = EventBantuan::findOrFail($id);

        $event->update([
            'nama_event' => $request->nama_event
        ]);

        return redirect()
            ->route('petugas.event.index')
            ->with('success', 'Event berhasil diupdate');
    }

    public function destroy($id)
    {
        EventBantuan::findOrFail($id)->delete();

        return redirect()
            ->route('petugas.event.index')
            ->with('success', 'Event berhasil dihapus');
    }
}