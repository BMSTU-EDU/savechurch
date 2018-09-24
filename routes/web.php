<?php

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'ChurchController@frontIndex');
Route::get('/churches/{church}', 'ChurchController@frontShow')->name('churches.front.show');

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('home');
	Route::get('/churches/trashed', 'ChurchController@trashedChurches')->name('admin.churches.list.trashed');
	Route::get('/churches/trashed/{church_id}/restore', 'ChurchController@restoreTrashed')->name('admin.churches.list.trashed.restore');
	Route::get('/churches/trashed/flush', 'ChurchController@flushTrashed')->name('admin.churches.list.trashed.flush');
	Route::resource('churches', 'ChurchController');
});


