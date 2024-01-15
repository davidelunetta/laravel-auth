@extends('layouts.app')
@section('content')
{{-- form con action  --}}
<form action="{{ route('admin.projects.store') }}" method="POST">
    @METHOD('POST')
    @CSRF
    <div class="form-floating">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nome progetto</label>
            <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="...">
        </div>
        
        <div class="mb-3">
            <label for="floatingTextarea">Descrizione progetto</label>
            <textarea class="form-control" placeholder="..." id="floatingTextarea" name="description"></textarea>
           
        </div>
        
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Data creazione</label>
            <input type="text" name="start_date" class="form-control" id="formGroupExampleInput2" placeholder="...">
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Crea progetto</button>
</form>
  
  {{-- end form --}}
  @endsection