<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Albums;

class AlbumsController extends Controller
{
    //
    public function index(){
        $albums = Albums::all();
        return view('albums.index', compact('albums'));
    }
}
