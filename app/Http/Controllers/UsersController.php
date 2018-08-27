<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        if (auth()->id() !== $user->id) {
            return redirect('/');
        }

        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);

        $this->validate($request, [
            'brief' => 'string|max:30'
        ]);

        $user->update(['brief' => request('brief')]);

        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $user->id);
    }

    public function password(User $user, Request $request)
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
}
