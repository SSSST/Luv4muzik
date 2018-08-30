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

    public function show(Musician $musician)//音乐人主页
    {
        // dd($musician);
        return view('musicians.show', compact('musician'));
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
}
