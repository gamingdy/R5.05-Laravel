<!-- resources/views/evaluations/notes.blade.php -->
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/notes.css') }}">

@section('content')
    <h1>Notes pour l'évaluation: {{ $evaluation->titre }}</h1>

    <table>
        <thead>
        <tr>
            <th>Élève</th>
            <th>Note</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($notes as $note)
            <tr>
                <td>{{ $note->eleve->nom }} {{ $note->eleve->prenom }}</td>
                <td>{{ $note->note }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
