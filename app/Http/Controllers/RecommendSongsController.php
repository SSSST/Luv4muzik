<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecommendSong;
use App\Models\Song;

class RecommendSongsController extends Controller
{
    public function index()//所有推荐歌曲
    {
        $recommendSongs = RecommendSong::latest()->paginate(10);

        return view('recommendSongs.index', compact('recommendSongs'));
    }

    public function show(RecommendSong $recommendSong)//展示推荐歌曲
    {
        return view('recommendSongs.show', compact('recommendSong'));
    }

    public function create()//添加推荐歌曲
    {
        return view('recommendSongs.create');
    }

    public function store(Request $request)//储存推荐歌曲
    {
        $this->validate($request, [
            'title' => 'required|string|max:20',
            'brief' => 'required|string|max:30',
            'recommend_song' => 'required|string',
            'body' => 'required|string|min:100',
        ]);

        $recommendSong = RecommendSong::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'brief' => $request->brief,
            'body' => $request->body,
            'song_name' => $request->recommend_song
        ]);

        if($song = Song::where('name', '=', $request->recommend_song)->first()) {
            $recommendSong->song_id = $song->id;
            $recommendSong->save();
        }

        return redirect()->route('recommendSongs.show', $recommendSong);
    }
}
