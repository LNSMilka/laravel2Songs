<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{

    public function index()
    {
        $songs = Song::all();
        return view('songs.index', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('songs.create');
    }

    // Handle form submission
    public function store(Request $request)
    {
//        Song::create([
//            'title' => $request->input('title'),
//            'singer' => $request->input('singer'),
//        ]);

        Song::create($request->only(['title', 'singer']));

        return redirect('songs');
    }
    public function show($id)
    {
        //$songs = $this->songs?? 'song not found';
        $song = Song::find($id);
        return view('songs.show', ['song' => $song]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $song = Song::find($id);
        return view('songs.edit', ['song' => $song]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'singer' => 'required|string'
        ]);

        Song::findOrFail($id)->update($validatedData);

        return redirect('songs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Song::find($id)->delete();
        return redirect('songs.index');
    }
}
