<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musician;

class MusicianController extends Controller
{
    public function index()//所有音乐人
    {
        $musicians = Musician::latest()->paginate(10);

        return view('musicians.index', compact('musicians'))->with('active', 2);
    }
}
