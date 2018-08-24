<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfilesTest extends TestCase
{
    use RefreshDatabase;

    /** @test*/
    public function a_user_has_a_profile()//用户主页
    {
        $user = factory('App\Models\User')->create();

        $this->get(route('users.show', $user->id))->assertSee($user->brief);
    }

    /** @test*/
    public function a_user_can_update_profile()//非本人不可修改主页
    {
        $this->actingAs(factory('App\Models\User')->create());

        $user = factory('App\Models\User')->create();

        $this->get(route('users.edit', $user->id))
          ->assertRedirect('/');

        $this->post(route('users.update', $user->id))->assertStatus(401);
    }
}
