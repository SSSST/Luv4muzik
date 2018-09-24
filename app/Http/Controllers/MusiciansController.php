<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musician;
use App\Models\Song;

class MusiciansController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'showSongs']);
    }
    public function index()//所有音乐人
    {
        $musicians = Musician::latest()->paginate(10);

        return view('musicians.index', compact('musicians'))->with('active', 2);
    }

    public function show(Musician $musician)//音乐人主页
    {
        $songs = Song::where('songs.musician_id', $musician->id)->inRandomOrder()->take(5)->get();

        return view('musicians.show', compact('musician', 'songs'));
    }

    public function update(Request $request, Musician $musician)//修改音乐人介绍
    {
        $this->authorize('update', $musician);

        $this->validate($request, [
            'brief' => 'string|max:30'
        ]);

        $musician->update(['brief' => request('brief')]);

        session()->flash('success', '音乐人资料更新成功！');

        return redirect()->route('musicians.show', $musician->id);
    }

    public function create()//创建音乐人
    {
        return view('musicians.create');
    }

    public function store(Request $request)//储存音乐人
    {
        $this->validate($request, [
            'name' => 'required|unique:musicians|string|max:30',
            'brief' => 'required|string|max:30'
        ]);

        $musician = Musician::create([
            'name' => $request->name,
            'brief' => $request->brief
        ]);

        return redirect()->route('musicians.show', $musician->id);
    }

    public function canBeEdited(Musician $musician)//修改can_be_edited
    {
        $musician->changeEdit();

        return redirect()->route('musicians.show', $musician);
    }

    public function showSongs(Musician $musician)//展示音乐人所有作品
    {
        $songs = Song::where('musician_id', '=', $musician->id)->orderBy('created_at')->paginate(10);

        return view('musicians.showSongs', compact('songs'));
    }
}
