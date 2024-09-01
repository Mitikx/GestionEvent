@extends('layouts.app')

@section('content')
    <h1>Créer un événement</h1>

    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label for="date">Date :</label>
            <input type="datetime-local" id="date" name="date" value="{{ old('date') }}" required>
        </div>
        <div>
            <label for="max_participants">Nombre maximum de participants :</label>
            <input type="number" id="max_participants" name="max_participants" value="{{ old('max_participants') }}" required>
        </div>
        <button type="submit">Créer</button>
    </form>
@endsection
