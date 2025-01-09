<!-- resources/views/eleves/create.blade.php -->
<!-- @extends('layouts.app') -->
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@section('content')
    <h1>Ajouter une évaluation</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('evaluations.store') }}" method="POST">
        @csrf
        <label for="titre">Titre:</label>
        <input type="text" name="titre" id="titre" required>
        <label for="coefficient">Coefficient:</label>
        <input type="text" name="coefficient" id="coefficient" required>
        <label for="date">Date de l'évaluation:</label>
        <input type="date" name="date" id="date" required>
        <label for="module_code">Code du module:</label>
        <input type="text" name="module_code" id="module_code" required>
        <button type="submit">Ajouter</button>
    </form>
@endsection
