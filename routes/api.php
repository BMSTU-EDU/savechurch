<?php

Route::post('/image', 'ImageController@uploadImage')->name('image.upload');
Route::delete('/image/file_delete', 'ImageController@imageFileDelete')->name('image.file_delete');
Route::delete('/image/entity_delete', 'ImageController@imageEntityDelete')->name('image.entity_delete');
//->middleware('auth:api');