<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\EventBantuan;

class EventController extends Controller
{
    public function index()
    {
        $events = EventBantuan::latest()->get();

        return view('masyarakat.event.index', compact('events'));
    }
}