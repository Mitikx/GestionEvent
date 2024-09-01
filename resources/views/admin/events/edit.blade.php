@extends('layouts.app')

@section('content')
    <h1>Modifier l'événement</h1>

    <form action="{{ route('admin.events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" value="{{ old('name', $event->name) }}" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description">{{ old('description', $event->description) }}</textarea>
        </div>
        <div>
            <label for="date">Date :</label>
            <input type="datetime-local" id="date" name="date" value="{{ old('date', $event->date->format('Y-m-d\TH:i')) }}" required>
        </div>
        <div>
            <label for="max_participants">Nombre maximum de participants :</label>
            <input type="number" id="max_participants" name="max_participants" value="{{ old('max_participants', $event->max_participants) }}" required>
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
