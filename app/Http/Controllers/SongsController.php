<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SongsController extends Controller
{
    public function show(Song $song)
    {
        return view('songs.show', compact('song'));
    }
}
