<?php

Route::get('/', function () {
    return redirect('/diary');
})->name("home");


Route::group(['prefix' => '/diary'], function () {
	Route::get('/', 'DiaryController@mydiary')->name('mydiary');
	Route::get('/{login}', 'DiaryController@diary')->name('diary');
});
Route::get('/profile', 'DiaryController@profile')->name('profile');

Route::post('/profile_save', 'DiaryController@profile_save_create')->name('profile_save');
Route::get('/profile_save', function() {
	 return redirect()->route("profile");
});


Auth::routes();

Route::group(['prefix' => '/inapi'], function () {
	Route::get('twits/{user_id}', "TwitController@getall");
	Route::post('createtwit', "TwitController@create");
	Route::delete('twit/{id}', 'TwitController@delete');
});

Route::get("/read_diary/{login}", "DiaryController@read_diary")->name("read_diary");
Route::get("/notread_diary/{login}", "DiaryController@notread_diary")->name("notread_diary");
