<!-- resources/views/eleves/grades.blade.php -->
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

@section('content')
    <h1>Notes de {{ $eleve->nom }} {{ $eleve->prenom }}</h1>
    <h2>Moyenne: {{ $eleve->average_grade }}</h2>
    <table>
        <thead>
        <tr>
            <th>Titre de l'évaluation</th>
            <th>Note</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($eleve->evaluations as $evaluationEleve)
            <tr>
                <td>{{ $evaluationEleve->evaluation->titre }}</td>
                <td>{{ $evaluationEleve->note }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
