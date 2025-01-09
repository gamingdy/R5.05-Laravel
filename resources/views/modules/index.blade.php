<!-- resources/views/eleves/index.blade.php -->
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

@section('content')
    <h1>Liste des modules</h1>

    <a href="{{ route('modules.create') }}" class="create-button">Ajouter un module</a>

    <table>
        <thead>
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Coefficient</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($modules as $module)
            <tr>
                <td>{{ $module->code }}</td>
                <td>{{ $module->nom }}</td>
                <td>{{ $module->coefficient }}</td>
                <td>
                    <a href="{{ route('modules.edit', $module->id) }}" class="edit-button">Modifier</a>
                    <form action="{{ route('modules.destroy', $module->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Supprimer</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
