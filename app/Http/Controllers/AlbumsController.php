<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Albums;
use Illuminate\Support\Facades\Validator;

class AlbumsController extends Controller
{
    public function index() {
        $albums = Albums::all();
        return view('albums.index', compact('albums'));
    }
    public function show($id) {
        $albums = Albums::find($id);
        return view('albums.show', compact('albums'));
    }
    public function create()
    {
        return view('albums.create');
    }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'year' => 'required|integer|min:1900|max:' . date('Y'),
        'times_sold' => 'required|integer|min:0|max:1000000000',
    ]);

    $album = Albums::create($validatedData);

    return redirect()->route('albums.index');
}
    public function edit($id)
    {
        $albums = albums::findOrFail($id);
        return view('albums.edit', compact('albums'));
    }
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'times_sold' => 'required|integer',
        ]) ;
        $album = Albums::findOrFail($id);
        $album->update($validator);
        return redirect()->route('albums.index');
    }
    public function destroy($id){
        Albums::destroy($id);
        return redirect()->route('albums.index');
    }
}
