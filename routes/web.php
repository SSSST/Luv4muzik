<?php



Route::get('/', function () {
    return view('home');
});//主页

//用户相关
{
    Auth::routes();//用户注册、登录、修改密码
    Route::get('users/{user}', 'UsersController@show')->name('users.show');//用户主页
}
