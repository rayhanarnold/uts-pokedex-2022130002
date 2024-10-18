@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <div class="row">
                <div class="col-6">
                    <img src="{{ Storage::url($pokemon->photo) }}" class="img-fluid">
                </div>
                <div class="col-6">
                    <h2>{{ $pokemon->name }}</h2>
                    <p>Species: {{ $pokemon->species }}</p>
                    <p>Primary Type: {{ $pokemon->primary_type }}</p>
                    <p>Weight: {{ $pokemon->weight }} kg</p>
                    <p>Height: {{ $pokemon->height }} m</p>
                    <p>HP: {{ $pokemon->hp }}</p>
                    <p>Attack: {{ $pokemon->attack }}</p>
                    <p>Defense: {{ $pokemon->defense }}</p>
                    <p>Legendary: {{ $pokemon->is_legendary ? 'Yes' : 'No' }}</p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('pokemon.edit', $pokemon) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('pokemon.destroy', $pokemon) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('pokemon.index') }}">Back to Pokedex</a>
            </div>
        </main>
    </div>
@endsection
