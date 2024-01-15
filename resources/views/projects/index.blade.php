@extends('layouts.app')
@section('content')
<h1>Lista dei Progetti</h1>
<div class="container">
    <ul class="list-unstyled d-flex">
        @foreach($projects as $project)
            <li class="card mb-3 flex-fill" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->name }}</h5>
                    <p class="card-text">{{ $project->description }}</p>
                    <p class="card-text"><strong>Data di inizio:</strong> {{ $project->start_date }}</p>
                </div>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Nuovo Progetto</a>
    
</div>
@endsection