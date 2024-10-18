@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-primary mb-3" href="{{ route('pokemon.create') }}">Add New Pokemon</a>

        @if($pokemons->isEmpty())
            <p>No Pokémon found!</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Species</th>
                        <th>Primary Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pokemons as $pokemon)
                        <tr>
                            <td>{{ $pokemon->id }}</td>
                            <td>{{ $pokemon->name }}</td>
                            <td>{{ $pokemon->species }}</td>
                            <td>{{ $pokemon->primary_type }}</td>
                            <td>
                                <a href="{{ route('pokemon.show', $pokemon->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('pokemon.edit', $pokemon->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $pokemons->links() }}
        @endif
    </div>
@endsection
