<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::resource('churches', 'ChurchController');
Route::get('/admin', 'AdminController@index')->name('home');
Route::get('/admin/churches', 'AdminController@churchesList')->name('admin.churches.list');
