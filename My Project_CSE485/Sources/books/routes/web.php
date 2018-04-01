<?php

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/login', 'LoginController@login')->name('user.login');
Route::post('/login', 'LoginController@authenticate')->name('user.authenticate');
Route::get('/register', 'RegisterController@index')->name('user.register');
Route::post('/register', 'RegisterController@register')->name('user.doRegister');


Route::get('/logout', 'LogoutController@logout')->name('user.logout');

Route::get('/books', 'BookController@index')->name('book.index');
Route::get('/books/{id}', 'BookController@show')->name('book.show');
Route::get('/books/{id}/thumbnail', 'BookController@thumbnail')->name('book.thumbnail');


Route::get('/search', 'SearchController@index')->name('search.index');


Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => 'adminRequired',
], function () {

    Route::get('/books', 'BookController@index')->name('admin.book.index');
    Route::get('/books/create', 'BookController@create')->name('admin.book.create');
    Route::post('/books/create', 'BookController@store')->name('admin.book.store');
    Route::get('/books/{id}/edit', 'BookController@edit')->name('admin.book.edit');
    Route::post('/books/{id}/edit', 'BookController@update')->name('admin.book.update');
    Route::delete('/books/{id}', 'BookController@remove')->name('admin.book.remove');

});
