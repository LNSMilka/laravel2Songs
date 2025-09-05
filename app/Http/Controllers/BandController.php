<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Album;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index() {
        $band = Band::all();
        return view('bands.index', compact('band'));
    }
    public function show($id) {
        $band = Band::with('albums')->findorfail($id);
        return view('bands.show', compact('band'));
    }
    public function create()
    {
        return view('bands.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'founded' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $band = Band::create($validator);

        return redirect()->route('bands.index');
    }
    public function edit($id)
    {
        $albums = Album::all();
        $band = Band::with('albums')->findOrFail($id);
        return view('bands.edit', compact('band', 'albums'));
    }
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'founded' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $band = Band::findOrFail($id);
        $band->update($validator);

        $selectedAlbums = $request->input('albums', []);

        Album::where('band_id', $band->id)
            ->whereNotIn('id', $selectedAlbums)
            ->update(['band_id' => null]);

        Album::whereIn('id', $selectedAlbums)
            ->update(['band_id' => $band->id]);

        return redirect()->route('bands.index');
    }

    public function destroy($id){
        Band::destroy($id);
        return redirect()->route('bands.index');
    }
}
