@extends('layouts.app') 

@section('content')
    <div>
        <h1>{{ $project->name }}</h1>
        <p>{{ $project->description }}</p>
        <p><strong>Data di inizio:</strong> {{ $project->start_date }}</p>
    </div>
@endsection