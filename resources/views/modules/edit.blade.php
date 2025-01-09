<!-- resources/views/eleves/create.blade.php -->
<!-- @extends('layouts.app') -->
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@section('content')
    <h1>Modifier une évaluation</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('modules.update', $module->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="code">Code:</label>
        <input type="text" name="code" id="code" value="{{$module->code}}" required>

        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="{{$module->nom}}" required>
        <label for="coefficient">Coefficient:</label>
        <input type="text" name="coefficient" id="coefficient" value="{{$module->coefficient}}" required>
        <button type="submit">Modifier</button>
    </form>
@endsection
