<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Musician;

class SongsController extends Controller
{
    public function show(Song $song)//展示作品
    {
        return view('songs.show', compact('song'));
    }

    public function create(Musician $musician)//添加作品
    {
        return view('songs.create', compact('musician'));
    }

    public function store(Request $request, Musician $musician)//储存作品
    {
        $this->validate($request, [
            'name' => 'required|string',
            'brief' => 'required|string|max:50',
            'lyric' => 'required|string'
        ]);
        // dd($musician->id);
        $song = Song::create([
            'name' => $request->name,
            'brief' => $request->brief,
            'lyric' => $request->lyric
        ]);

        $song->musician_id = $musician->id;
        $song->save();
        // dd($song);
        return redirect()->route('songs.show', $song);
    }
}
