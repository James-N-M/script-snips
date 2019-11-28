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
// Temp till homepage
Route::get('/', 'SnippetsController@index');

Route::get('/snippets', 'SnippetsController@index')->name('home');
Route::get('/snippets/create', 'SnippetsController@create');
Route::get('/snippets/{snippet}', 'SnippetsController@show');
Route::get('/snippets/languages/{language}', 'LanguageSnippetsController@index');
Route::post('snippets/{snippet}/comments', 'CommentsController@store');
Route::get('/snippets/{snippet}/fork', 'SnippetsController@create');
Route::post('/snippets/{snippet}/like', 'SnippetLikesController@store');
Route::post('/snippets/{snippet}/unlike', 'SnippetLikesController@store');
Route::post('/snippets', 'SnippetsController@store');

Route::get('user/{user}/snippets', 'UserSnippets@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
