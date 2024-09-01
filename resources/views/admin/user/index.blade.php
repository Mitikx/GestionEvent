@extends('layouts.app')

@section('content')
    <h1>Gestion des utilisateurs</h1>

    <ul>
        @foreach($users as $user)
            <li>
                <h2>{{ $user->name }}</h2>
                <p>Email : {{ $user->email }}</p>
                <p>Admin : {{ $user->isAdmin() ? 'Oui' : 'Non' }}</p>
            </li>
        @endforeach
    </ul>
@endsection
