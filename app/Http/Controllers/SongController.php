<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SongController extends Controller
{

    public function index()
    {
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $songsFromAPI = [];

        if($request->query->has('title')) {

            $api_key = '36f4f6e9a445302609cdea9a40cd2db0';

            $title = $request->query('title');

            $response = Http::get(
                'http://ws.audioscrobbler.com/2.0/?method=track.search&track=' .
                $title . '&api_key=' . $api_key . '&format=json'
            )->json();

            $songsFromAPI = $response["results"]["trackmatches"]["track"];
        }

        return view('songs.create', compact('songsFromAPI'));
    }


    // Handle form submission
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'singer' => 'required|string'
        ]);

        $song = Song::create($validatedData);
        $song->albums()->sync($request->input('albums',[]));

        return redirect()->route('songs.index');
    }

    public function show($id)
    {
        $songs = Song::findorfail($id);
        return view('songs.show', compact('songs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $songs = Song::findorfail($id);
        $albums = Album::all();
        return view('songs.edit', compact('songs', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'singer' => 'required|string'
        ]);

        $song =  Song::findOrFail($id);
        $song->update($validatedData);
        $song->albums()->sync($request->input('albums', []));

        return redirect()->route('songs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $song = Song::findorfail($id)->delete();
        return redirect()->route('songs.index');
    }
}
