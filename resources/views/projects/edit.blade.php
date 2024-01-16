@extends('layouts.app')

@section('content')
    <div>
        <h1>Modifica Progetto</h1>
        <form method="POST" action="{{ route('admin.projects.update', $project) }}">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Nome:</label>
                <input type="text" name="name" value="{{ $project->name }}" required>
            </div>
            <div>
                <label for="description">Descrizione:</label>
                <textarea name="description" required>{{ $project->description }}</textarea>
            </div>
            <div>
                <label for="start_date">Data di Inizio:</label>
                <input type="date" name="start_date" value="{{ $project->start_date }}" required>
            </div>
            <div>
                <label for="image">Immagine:</label>
                <input type="file" name="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        </form>
    </div>
@endsection
