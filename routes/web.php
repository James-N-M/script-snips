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

// Snippets Controller routes
Route::get('/snippets', 'SnippetsController@index')->name('home');
Route::get('/snippets/create', 'SnippetsController@create');
Route::get('/snippets/{snippet}', 'SnippetsController@show');
Route::get('/snippets/{snippet}/fork', 'SnippetsController@create');
Route::post('/snippets', 'SnippetsController@store');

Route::post('/languages/{language}/favorites', 'LanguageFavoritesController@store');


// Snippet Likes Controller routes
Route::post('/snippets/{snippet}/like', 'SnippetLikesController@store');
Route::post('/snippets/{snippet}/unlike', 'SnippetLikesController@store');

// Language Snippets Controller routes
Route::get('/snippets/languages/{language}', 'LanguageSnippetsController@index');

// Comments Controller routes
Route::post('snippets/{snippet}/comments', 'CommentsController@store');

// Comment Likes Controller
Route::post('/comments/{comment}/like', 'CommentLikesController@store');
Route::post('/comments/{comment}/unlike', 'CommentLikesController@store');

// User Snippets Controller routes
Route::get('users/{user}/snippets', 'UserSnippets@index');

// Users Controller routes
Route::get('users/{user}/profile', 'UsersController@profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
