@extends('layouts.app')

@section('content')
    <h1>Liste des événements</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif

    <a href="{{ route('events.create') }}">Créer un événement</a>

    <ul>
        @foreach($events as $event)
            <li>
                <h2>{{ $event->name }}</h2>
                <p>{{ $event->description }}</p>
                <p>Date : {{ $event->date }}</p>
                <p>Places restantes : {{ $event->max_participants - $event->users()->count() }}</p>

                @if($event->users()->where('user_id', auth()->user()->id)->exists())
                    <form action="{{ route('registrations.destroy', $event->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Se désinscrire</button>
                    </form>
                @elseif($event->users()->count() < $event->max_participants)
                    <form action="{{ route('registrations.store', $event->id) }}" method="POST">
                        @csrf
                        <button type="submit">S'inscrire</button>
                    </form>
                @else
                    <p>Complet</p>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
