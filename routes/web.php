<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'SnippetsController@index')->name('home');
Route::get('/snippets/create', 'SnippetsController@create');
Route::get('/snippets/{snippet}/fork', 'SnippetsController@create');
Route::get('/snippets/{snippet}', 'SnippetsController@show');
Route::post('/snippets', 'SnippetsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
