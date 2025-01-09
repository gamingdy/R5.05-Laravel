<!-- resources/views/eleves/show.blade.php -->
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">

@section('content')
    <h1>Profil de {{ $eleve->nom }} {{ $eleve->prenom }}</h1>

    <div class="profile-container">
        <img src="{{ asset('storage/' . $eleve->image) }}" alt="Photo de profil de {{ $eleve->nom }}"
             class="profile-image">
        <div class="profile-details">
            <p><strong>Nom:</strong> {{ $eleve->nom }}</p>
            <p><strong>Prénom:</strong> {{ $eleve->prenom }}</p>
            <p><strong>Date de naissance:</strong> {{ $eleve->date_naissance }}</p>
            <p><strong>Numéro étudiant:</strong> {{ $eleve->numero_etudiant }}</p>
            <p><strong>Email:</strong> {{ $eleve->email }}</p>
        </div>
    </div>
@endsection
