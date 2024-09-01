<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventAdminController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'date' => 'required|date',
            'max_participants' => 'required|integer',
        ]);

        Event::create($request->all());

        return redirect()->route('admin.events.index')->with('success', 'Événement créé avec succès !');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'date' => 'required|date',
            'max_participants' => 'required|integer',
        ]);

        $event->update($request->all());

        return redirect()->route('admin.events.index')->with('success', 'Événement mis à jour avec succès !');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Événement supprimé avec succès !');
    }
}

