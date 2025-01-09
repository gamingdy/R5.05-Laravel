<!-- resources/views/eleves/index.blade.php -->
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

@section('content')
    <h1>Liste des élèves</h1>
    <a href="{{ route('eleves.create') }}" class="create-button">Créer</a>

    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Numéro étudiant</th>
            <th>Email</th>
            <th>Image</th>
            <th>Action</th>
            <th>Consulter</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($eleves as $eleve)
            <tr>
                <td>{{ $eleve->nom }}</td>
                <td>{{ $eleve->prenom }}</td>
                <td>{{ $eleve->date_naissance }}</td>
                <td>{{ $eleve->numero_etudiant }}</td>
                <td>{{ $eleve->email }}</td>

                <td><img src="{{ asset('storage/' . $eleve->image) }}" alt="Photo de profil de {{ $eleve->nom }}"
                         class="profile-image" width="50"></td>
                <td>
                    <a href="{{ route('eleves.edit', $eleve->id) }}" class="edit-button">Modifier</a>
                    <form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Supprimer</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('eleves.show', $eleve->id) }}" class="detail-button">Consulter</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
