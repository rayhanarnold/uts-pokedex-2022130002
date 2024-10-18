@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pokemon.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ old('name') }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label" for="species">Species</label>
                        <input class="form-control @error('species') is-invalid @enderror" type="text" name="species"
                            id="species" value="{{ old('species') }}">
                    </div>

                    <div class="col-6">
                        <label class="form-label" for="primary_type">Primary Type</label>
                        <select class="form-select @error('primary_type') is-invalid @enderror" name="primary_type"
                            id="primary_type">
                            <option value="">Choose a type...</option>
                            @foreach(['Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison', 'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic', 'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'] as $type)
                                <option value="{{ $type }}" {{ old('primary_type') == $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6">
                        <label class="form-label" for="weight">Weight</label>
                        <input class="form-control @error('weight') is-invalid @enderror" type="number" step="0.01"
                            name="weight" id="weight" value="{{ old('weight') }}">
                    </div>

                    <div class="col-6">
                        <label class="form-label" for="height">Height</label>
                        <input class="form-control @error('height') is-invalid @enderror" type="number" step="0.01"
                            name="height" id="height" value="{{ old('height') }}">
                    </div>

                    <div class="col-4">
                        <label class="form-label" for="hp">HP</label>
                        <input class="form-control @error('hp') is-invalid @enderror" type="number" name="hp" id="hp"
                            value="{{ old('hp') }}">
                    </div>

                    <div class="col-4">
                        <label class="form-label" for="attack">Attack</label>
                        <input class="form-control @error('attack') is-invalid @enderror" type="number" name="attack"
                            id="attack" value="{{ old('attack') }}">
                    </div>

                    <div class="col-4">
                        <label class="form-label" for="defense">Defense</label>
                        <input class="form-control @error('defense') is-invalid @enderror" type="number" name="defense"
                            id="defense" value="{{ old('defense') }}">
                    </div>

                    <div class="col-6">
                        <label class="form-label" for="photo">Photo</label>
                        <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo"
                            id="photo">
                    </div>

                    <div class="col-6 mt-3">
                        <label for="is_legendary">
                            <input class="form-check-input" type="checkbox" name="is_legendary"
                                id="is_legendary" {{ old('is_legendary') ? 'checked' : '' }}>
                            Is Legendary
                        </label>
                    </div>

                    <button class="btn btn-primary mt-3" type="submit">Add Pokemon</button>
                </div>
            </form>
            <a href="{{ route('pokemon.index') }}">Back to Pokedex</a>
        </main>
    </div>
@endsection
