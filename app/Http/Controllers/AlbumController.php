<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Song;
use App\Models\Band;
use Illuminate\Support\Facades\Validator;


class AlbumController extends Controller
{
    public function index() {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }
    public function show($id) {
        $albums = Album::with('band', 'songs')->findorfail($id);
        return view('albums.show', compact('albums'));
    }
    public function create()
    {
        $bands = Band::orderBy('name')->get();
        return view('albums.create', compact('bands'));
    }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'year' => 'required|integer|min:1900|max:' . date('Y'),
        'times_sold' => 'required|integer|min:0|max:1000000000',
        'band_id' => 'required|integer|exists:bands,id'
    ]);

    $album = Album::create($validatedData);

    return redirect()->route('albums.index');
    }
    public function edit($id)
    {
        $albums = Album::findOrFail($id);
        $songs = Song::all();
        $bands = Band::all();
        return view('albums.edit', compact('albums', 'songs', 'bands'));
    }
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'times_sold' => 'required|integer',
            'band_id' => 'required|integer'
        ]) ;
        $album = Album::findOrFail($id);
        $album->update($validator);
        $album->songs()->sync($request->input('songs', []));
        return redirect()->route('albums.index');
    }
    public function destroy($id){
        Album::destroy($id);
        return redirect()->route('albums.index');
    }
}
