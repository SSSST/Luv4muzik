<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\User;
use Auth;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $statuses = Status::latest()->paginate(10);

        return view('statuses.index', compact('statuses'))->with('active', 1);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'content' => 'required|max:140'
        ]);

        $user->statuses()->create([
            'content' => $request->content
        ]);

        return redirect()->back();
    }

    public function destroy(Status $status)
    {
        $this->authorize('destroy', $status);

        $status->delete();
        session()->flash('success', '动态已被成功删除！');
        return redirect()->back();
    }

    public function show(User $user)
    {
        $statuses = $user->statuses()->paginate(10);

        return view('statuses.show', compact('user', 'statuses'));
    }

    public function followings()//关注人动态
    {
        if(Auth::check()){
            $user_ids = Auth::user()->followings->pluck('id')->toArray();
            $statuses = Status::whereIn('user_id', $user_ids)
                                ->with('user')
                                ->orderBy('created_at', 'desc')
                                ->paginate(10);

            return view('statuses.show_followings_statuses', compact('statuses'))->with('active', 2);
        }
    }
}
