<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecommendSong;

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
}
