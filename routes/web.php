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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

use App\Http\Middleware\LoginUserCheck;

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::group(['middleware' => ['loginUserCheck']], function () {

  Route::get('/top', 'PostsController@index');
  Route::post('/top', 'PostsController@index');

  Route::resource('top', PostsController::class);


  Route::get('/post/{id}/delete', 'PostsController@delete');
  Route::post('/post/update', 'PostsController@update');


  Route::get('/profile', 'UsersController@profile');


  Route::get('/search', 'UsersController@index');
  Route::post('/search', 'UsersController@index');

  Route::get('/search_user', 'UsersController@search');


  Route::get('/follow-list', 'FollowsController@followList');
  Route::get('/follower-list', 'FollowsController@followerList');
  Route::get('/follow', 'FollowsController@followerList');
  Route::get('/unfollow', 'FollowsController@followerList');

  Route::post('/follow', [FollowsController::class, 'follow'])->name('follow'); // フォローする
  Route::post('/unfollow', [FollowsController::class, 'unfollow'])->name('unfollow'); // フォロー解除

  Route::get('/logout', 'Auth\LoginController@logout');
});
