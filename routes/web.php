<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::resource('churches', 'ChurchController');

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('home');
    Route::get('/churches', 'AdminController@churchesList')->name('admin.churches.list');
    Route::get('/churches/trashed', 'AdminController@trashedChurches')->name('admin.churches.list.trashed');
    Route::get('/churches/trashed/{church_id}/restore', 'AdminController@restoreTrashed')->name('admin.churches.list.trashed.restore');
    Route::get('/churches/trashed/flush', 'AdminController@flushTrashed')->name('admin.churches.list.trashed.flush');
});


