<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Auth;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $statuses = Status::latest()->paginate(10);

        return view('statuses.index', compact('statuses'));
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
}
