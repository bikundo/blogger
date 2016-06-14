<?php


Route::get('/', 'FrontEndController@home');

Route::auth();
Route::group(['prefix' => '/data'], function () {
    Route::any('/users', 'HomeController@allUsers')->name('datatables.all.users');
    Route::any('/files', 'HomeController@allFiles')->name('datatables.all.files');
    Route::any('/downloads', 'HomeController@allDownloads')->name('datatables.all.downloads');
});

Route::get('/users', 'HomeController@getUsers')->name('datatables.get.users');
Route::get('/files', 'HomeController@getFiles')->name('datatables.get.files');
Route::get('/files/upload', 'HomeController@uploadFile')->name('get.upload');
Route::post('/files/upload', 'HomeController@upload')->name('file.upload');
Route::get('/downloads', 'HomeController@getDownloads')->name('datatables.get.downloads');

Route::get('/home', 'FrontEndController@home')->name('homepage');
Route::get('/download/{id}', 'FrontEndController@download')->name('download.file');
Route::get('/view/{id}', 'FrontEndController@view')->name('view.file');
