<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Event $event)
    {
        if ($event->users()->count() < $event->max_participants) {
            $event->users()->attach(auth()->user()->id);
            return redirect()->route('events.index')->with('success', 'Inscription réussie !');
        }

        return redirect()->route('events.index')->with('error', 'Cet événement est complet.');
    }

    public function destroy(Event $event)
    {
        $event->users()->detach(auth()->user()->id);
        return redirect()->route('events.index')->with('success', 'Désinscription réussie.');
    }
}

