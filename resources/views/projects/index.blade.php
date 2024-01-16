@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Lista dei Progetti</h1>
    <ul class="list-unstyled d-flex">
        @foreach($projects as $project)
        <div class="card-body ">
            <li class="card mb-3 mx-2 " style="">
                    <h5 class="card-title">{{ $project->name }}</h5>
                    <p class="card-text">{{ $project->description }}</p>
                    <p class="card-text"><strong>Data di inizio:</strong> {{ $project->start_date }}</p>
                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary">Dettagli</a>
            </li>
        </div>
        @endforeach
    </ul>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Nuovo Progetto</a>
    
</div>
@endsection