<?php

namespace App\Http\Controllers;

use App\Models\Bands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BandsController extends Controller
{
    public function index() {
        $bands = Bands::all();
        return view('bands.index', compact('bands'));
    }
    public function show($id) {
        $bands = Bands::find($id);
        return view('bands.show', ['band' => $bands]);
    }
    public function create()
    {
        return view('bands.create');
    }
    public function store(Request $request)
    {
        Bands::create($request->all());
        return redirect()->route('bands.index');
    }
    public function edit($id)
    {
        $band = Bands::findOrFail($id);
        return view('bands.edit', compact('band'));
    }
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'founded' => 'required|integer|min:1900|max:' . date('Y'),
        ]) ;

        $band = Bands::findOrFail($id);
        $band->name = $request->name;
        $band->genre = $request->genre;
        $band->founded = $request->founded;
        $band->save();
        return redirect()->route('bands.index');
    }
    public function destroy($id){
        Bands::destroy($id);
        return redirect()->route('bands.index');
    }
}
