<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Storage;

class PokedexController extends Controller
{
    public function index()
    {
        $pokemon = Pokemon::all();
        return view('pokemon.index', compact('pokemon'));
    }

    public function create()
    {
        return view('pokemon.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'primary_type' => 'required|string',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'hp' => 'required|integer',
            'attack' => 'required|integer',
            'defense' => 'required|integer',
            'is_legendary' => 'nullable|boolean',

            'photo' => 'required|image|mimes:jpg,png,jpeg',

        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('pokemon', 'public');
        }

        Pokemon::create($data);

        return redirect()->route('pokemon.index')->with('success', 'Pokemon added successfully');
    }

    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show', compact('pokemon'));
    }

    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', compact('pokemon'));
    }

    public function update(Request $request, Pokemon $pokemon)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'primary_type' => 'required|string',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'hp' => 'required|integer',
            'attack' => 'required|integer',
            'defense' => 'required|integer',
            'is_legendary' => 'nullable|boolean',

            'photo' => 'nullable|image|mimes:jpg,png,jpeg',

        ]);

        if ($request->hasFile('photo')) {
            if ($pokemon->photo) {
                Storage::disk('public')->delete($pokemon->photo);
            }

            $data['photo'] = $request->file('photo')->store('pokemon', 'public');
        }

        $pokemon->update($data);

        return redirect()->route('pokemon.index')->with('success', 'Pokemon updated successfully');
    }

    public function destroy(Pokemon $pokemon)
    {
        if ($pokemon->photo) {
            Storage::disk('public')->delete($pokemon->photo);
        }

        $pokemon->delete();

        return redirect()->route('pokemon.index')->with('success', 'Pokemon deleted successfully');
    }
}
