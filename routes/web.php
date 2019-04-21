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

Route::get('/', function () {
    return view('welcome');
});

Route::get('privacy-Policy', 'HomeController@privacyPolicy');
Route::get('terms', 'HomeController@terms');

//For Github
Route::get('login/github', 'SocialiteController@githubRedirectToProvider');
Route::get('login/github/callback', 'SocialiteController@githubHandleProviderCallback');

//For Facebook
Route::get('login/facebook', 'SocialiteController@facebookRedirectToProvider');
Route::get('login/facebook/callback', 'SocialiteController@facebookHandleProviderCallback');

//For Google
Route::get('login/google', 'SocialiteController@googleRedirectToProvider');
Route::get('login/google/callback', 'SocialiteController@googleHandleProviderCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
