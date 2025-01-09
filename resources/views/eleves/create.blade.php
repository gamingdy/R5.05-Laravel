<!-- resources/views/eleves/create.blade.php -->
<!-- @extends('layouts.app') -->
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@section('content')
    <h1>Ajouter un élève</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('eleves.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" required>
        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" id="prenom" required>
        <label for="date_naissance">Date de naissance:</label>
        <input type="date" name="date_naissance" id="date_naissance" required>
        <label for="numero_etudiant">Numéro étudiant:</label>
        <input type="text" name="numero_etudiant" id="numero_etudiant" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="photo">Photo:</label>
        <input type="file" name="photo" id="photo">
        <button type="submit">Ajouter</button>
    </form>
@endsection
