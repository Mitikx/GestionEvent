@extends('layouts.app')

@section('content')
    <h1>Gestion des événements</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.events.create') }}">Créer un événement</a>

    <ul>
        @foreach($events as $event)
            <li>
                <h2>{{ $event->name }}</h2>
                <p>{{ $event->description }}</p>
                <p>Date : {{ $event->date }}</p>
                <p>Places restantes : {{ $event->max_participants - $event->users()->count() }}</p>
                <a href="{{ route('admin.events.edit', $event->id) }}">Modifier</a>
                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
