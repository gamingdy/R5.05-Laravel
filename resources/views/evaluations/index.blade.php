<!-- resources/views/eleves/index.blade.php -->
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

@section('content')
    <h1>Liste des évaluations</h1>

    <a href="{{ route('evaluations.create') }}" class="create-button">Ajouter une évaluation</a>

    <table>
        <thead>
        <tr>
            <th>Titre</th>
            <th>Date</th>
            <th>Coefficient</th>
            <th>Code Module</th>
            <th>Nom Module</th>
            <th>Coefficient Module</th>
            <th>Actions</th>
            <th>Consulter</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($evaluations as $evaluation)
            @php($module = $evaluation->module)
            <tr>
                <td>{{ $evaluation->titre }}</td>
                <td>{{ $evaluation->date }}</td>
                <td>{{ $evaluation->coefficient }}</td>
                <td>{{ $module->code }}</td>
                <td>{{ $module->nom }}</td>
                <td>{{ $module->coefficient }}</td>
                <td>
                    <a href="{{ route('evaluations.edit', $evaluation->id) }}" class="edit-button">Modifier</a>
                    <form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Supprimer</button>
                    </form>

                </td>
                <td>
                    <a href="{{ route('evaluations.show', $evaluation->id) }}" class="detail-button">Consulter</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
