<?php

Route::post('/image', 'ImageController@uploadImage')->name('image.upload');
Route::delete('/image/file_delete', 'ImageController@imageFileDelete')->name('image.file_delete');
Route::get('/churches', 'ChurchFrontController@jsonChurchList')->name('json.church.list');