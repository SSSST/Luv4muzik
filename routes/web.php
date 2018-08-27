<?php



Route::get('/', 'HomeController@index')->name('home.index');//主页

//用户相关
{
    Auth::routes();//用户注册、登录、修改密码
    Route::get('/users/{user}', 'UsersController@show')->name('users.show');//用户主页
    Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');//修改资料
    Route::patch('/users/{user}', 'UsersController@update')->name('users.update');//提交修改
    Route::patch('/users/{user}/password', 'UsersController@password')->name('users.password');//修改密码
    Route::get('/users', 'UsersController@index')->name('users.index');//全部用户
    // Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
}
