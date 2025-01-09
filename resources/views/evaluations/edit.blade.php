<!-- resources/views/eleves/create.blade.php -->
<!-- @extends('layouts.app') -->
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@section('content')
    <h1>Modifier une évaluation</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('evaluations.update', $evaluation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="titre">Titre:</label>
        <input type="text" name="titre" id="titre" value="{{$evaluation->titre}}" required>
        <label for="coefficient">Coefficient:</label>
        <input type="text" name="coefficient" id="coefficient" value="{{$evaluation->coefficient}}" required>
        <label for="date">Date de l'évaluation:</label>
        <input type="date" name="date" id="date" value="{{$evaluation->date}}" required>
        <label for="module_code">Code du module:</label>
        <input type="text" name="module_code" id="module_code" value="{{$module->code}}" required>
        <button type="submit">Modifier</button>
    </form>
@endsection
