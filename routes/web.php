<?php



Route::get('/', function () {
    return view('home');
});//主页

//用户相关
{
    Auth::routes();//用户注册、登录、修改密码
    Route::get('users/{user}', 'UsersController@show')->name('users.show');//用户主页
    Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit');//修改资料
    Route::post('users/{user}', 'UsersController@update')->name('users.update');//提交修改
}
