<!-- resources/views/eleves/create.blade.php -->
<!-- @extends('layouts.app') -->
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@section('content')
    <h1>Ajouter un module</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('modules.store') }}" method="POST">
        @csrf
        <label for="code">Code:</label>
        <input type="text" name="code" id="code" required>

        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" required>
        <label for="coefficient">Coefficient:</label>
        <input type="text" name="coefficient" id="coefficient" required>
        <button type="submit">Ajouter</button>
    </form>
@endsection
