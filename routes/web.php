<?php

Route::get('/', function () {
    return redirect('/diary');
})->name("home");


Route::group(['prefix' => '/diary'], function () {
	Route::get('/', 'DiaryController@mydiary')->name('mydiary');
	Route::get('/{login}', 'DiaryController@diary')->name('diary');
});
Route::get('/profile', 'DiaryController@profile')->name('profile');
Route::get('/searchdiary', 'DiaryController@searchdiary')->name('searchdiary');

Route::post('/profile_save', 'DiaryController@profile_save_create')->name('profile_save');
Route::get('/profile_save', function() {
	 return redirect()->route("profile");
});


Auth::routes();

Route::group(['prefix' => '/inapi'], function () {
	Route::get('twits/{user_id}', "TwitController@getall");
	Route::post('createtwit', "TwitController@create");
	Route::delete('twit/{id}', 'TwitController@delete');
	Route::post('like/{twit_id}', 'TwitController@like');
});

Route::get("/read_diary/{login}", "FollowController@read_diary")->name("read_diary");
Route::get("/notread_diary/{login}", "FollowController@notread_diary")->name("notread_diary");

Route::get('/followers/{login}',"FollowController@followers")->name("followers");
Route::get('/read/{login}',"FollowController@read")->name("read");
Route::get('/likeme/{login}',"FollowController@likeme")->name("likeme");
