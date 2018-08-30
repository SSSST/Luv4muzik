<?php

namespace App\Policies;

use App\Models\Musician;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MusicianPolicy
{
    use HandlesAuthorization;

    public function update(User $currentUser, Musician $musician)
    {
        return $currentUser->is_musician && ($currentUser->musician->id === $musician->id);//当前登录用户和需授权用户是否一样
    }
}
