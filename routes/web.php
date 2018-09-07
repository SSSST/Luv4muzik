<?php



Route::get('/', 'HomeController@index')->name('home');//主页

//用户相关
{
    Auth::routes();//用户注册、登录、修改密码
    Route::get('/users', 'UsersController@index')->name('users.index');//全部用户
    Route::get('/users/{user}', 'UsersController@show')->name('users.show');//用户主页
    Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');//修改资料
    Route::patch('/users/{user}', 'UsersController@update')->name('users.update');//提交修改
    Route::patch('/users/{user}/password', 'UsersController@password')->name('users.password');//修改密码
    Route::get('/users/{user}/musicians', 'UsersController@musician')->name('users.musician');//成为音乐人
    Route::post('/users/{user}/musicians/store', 'UsersController@musicianStore')->name('users.musicianStore');//成为音乐人
    // Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
}

//音乐人相关
{
    Route::get('/musicians', 'MusiciansController@index')->name('musicians.index');//所有音乐人
    Route::get('/musicians/create', 'MusiciansController@create')->name('musicians.create');//添加音乐人
    Route::post('/musicians/store', 'MusiciansController@store')->name('musicians.store');//储存音乐人
    Route::get('/musicians/{musician}', 'MusiciansController@show')->name('musicians.show');//音乐人主页
    Route::patch('/musicians/{musician}', 'MusiciansController@update')->name('musicians.update');//提交修改
    Route::get('/musicians/{musician}/can-be-edited', 'MusiciansController@canBeEdited')->name('musicians.canBeEdited');//修改can_be_edited
}

//作品相关
{
    Route::get('/songs/{musician}/create', 'SongsController@create')->name('songs.create');//添加作品
    Route::post('/songs/{musician}/store', 'SongsController@store')->name('songs.store');//添加作品
    Route::get('/songs/{song}', 'SongsController@show')->name('songs.show');//展示作品
}

//推荐作品
{
    Route::get('/recommend-songs', 'RecommendSongsController@index')->name('recommendSongs.index');//所有推荐歌曲
    Route::get('/recommend-songs/{recommendSong}', 'RecommendSongsController@show')->name('recommendSongs.show');//展示推荐作品
}
