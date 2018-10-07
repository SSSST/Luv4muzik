<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Musician;
use App\Models\Status;
use App\Models\RecommendSong;
use Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([
            'show', 'index', 'recommendSongs', 'followers', 'followings'
        ]);//非登录可见
    }

    public function show(User $user)//展示个人主页
    {
        $recommend_songs = RecommendSong::where('user_id', '=', $user->id)->inRandomOrder()->take(5)->get();
        $statuses = Status::where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->take(5)->get();

        return view('users.show', compact('user', 'recommend_songs', 'statuses'));
    }

    public function edit(User $user)//编辑资料页面
    {
        $this->authorize('update', $user);

        if (auth()->id() !== $user->id) {
            return redirect('/');
        }

        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)//更新个人介绍
    {
        $this->authorize('update', $user);

        $this->validate($request, [
            'brief' => 'string|max:30'
        ]);

        $user->update(['brief' => request('brief')]);

        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $user->id);
    }

    public function password(User $user, Request $request)//更新密码
    {
        $this->authorize('update', $user);

        if (Hash::check(request('old-password'), $user->password)) {
            $this->validate($request, [
                'password' => 'required|string|min:6|confirmed'
            ]);

            $user->update(['password' => bcrypt(request('password'))]);

            return redirect()->route('users.show', $user->id)->with('success', '您已成功修改密码');
        } else {
            return back()->with('danger', '旧密码输入错误');
        }
    }

    public function index()//全部用户
    {
        $users = User::latest()->paginate(10);

        return view('users.index', compact('users'))->with('active', 1);
    }

    public function musician(User $user)//成为音乐人
    {
        return view('users.becomeSinger', compact('user'));
    }

    public function musicianStore(Request $request, User $user)//提交申请
    {
        $this->validate($request, [
            'name' => 'required|string|max:30',
            'brief' => 'required|string|max:30'
        ]);

        $can_be_edited = $request->can_be_edited ? 1 : 0;

        if ($musician = Musician::where('name', $request->name)->first()){
            $musician->update([
                'name' => $request->name,
                'brief' => $request->brief,
                'can_be_edited' => $can_be_edited
            ]);
        } else {
            $musician = Musician::create([
                'name' => $request->name,
                'brief' => $request->brief,
                'can_be_edited' => $can_be_edited
            ]);
        }

        $musician->user_id = $user->id;
        $musician->is_active = 1;
        $musician->save();

        $user->is_musician = 1;
        $user->save();

        return redirect()->route('musicians.show', $musician);
    }

    public function recommendSongs(User $user)//查看用户所有推荐
    {
        $recommend_songs = RecommendSong::where('user_id', '=', $user->id)->orderBy('created_at')->paginate(10);

        return view('users.recommendSongs', compact('recommend_songs', 'user'));
    }

    public function followers(User $user)//查看粉丝
    {
        $users = $user->followers()->paginate(10);
        $title = "粉丝列表";

        return view('users.show_follow', compact('users', 'title', 'user'));
    }

    public function followings(User $user)//查看关注的人
    {
        $users = $user->followings()->paginate(10);
        $title = "关注人列表";

        return view('users.show_follow', compact('users', 'title', 'user'));
    }
}
