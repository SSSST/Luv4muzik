<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\RecommendSong;
use App\Models\Musician;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicians = Musician::inRandomOrder()->take(5)->get();//随机选取五个
        $recommendSongs = RecommendSong::inRandomOrder()->take(5)->get();

        return view('home')->with(compact('musicians', 'recommendSongs'));
    }
}
