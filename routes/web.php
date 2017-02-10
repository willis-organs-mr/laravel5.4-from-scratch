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
// App::make & resolve() are the same
// $stripe = App::make('App\Billing\Stripe');
// dd(resolve('App\Billing\Stripe'));



Route::get('/', 'PostsController@index');

Route::resource('tasks', 'TasksController');
Route::resource('posts', 'PostsController', [
    'names' => ['index' => 'home']
]);

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/post/{post}/comments', 'CommentsController@store');

Route::get('register', 'RegistrationsController@create');
Route::post('register', 'RegistrationsController@store');
Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');
Route::get('logout', 'SessionsController@destroy');
