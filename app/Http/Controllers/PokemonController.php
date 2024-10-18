<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemons = Pokemon::paginate(20);
        return view('pokemon.index', compact('pokemons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'numeric|max:99999999.99',
            'height' => 'numeric|max:99999999.99',
            'hp' => 'integer|max:9999',
            'attack' => 'integer|max:9999',
            'defense' => 'integer|max:9999',
            'is_legendary' => 'boolean|DEFAULT:FALSE',
            'photo' => 'nullable|image|max:2048|mimes:jpeg,jpg,png,gif,svg'
        ]);

    //    $photoPath = $request->file('photo') ? $request->file('photo')->store('photos', 'public') : null;
     //   $validated['photo'] = $photoPath;

        Pokemon::create($validated);
        return redirect()->route('pokemon.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', compact('pokemon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'numeric|max:99999999.99',
            'height' => 'numeric|max:99999999.99',
            'hp' => 'integer|max:9999',
            'attack' => 'integer|max:9999',
            'defense' => 'integer|max:9999',
            'is_legendary' => 'boolean|DEFAULT:FALSE',
            'photo' => 'nullable|image|max:2048|mimes:jpeg,jpg,png,gif,svg'
        ]);

        if ($request->file('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $photoPath;
        }

        $pokemon->update($validated);
        return redirect()->route('pokemon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->route('pokemon.index');
    }
}
