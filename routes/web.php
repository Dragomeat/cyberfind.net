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

Route::get('/', 'IndexController@index')->name('index');

Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::post('auth/login', 'Auth\LoginController@login')->name('auth.login.post');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::get('auth/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.request');
Route::post('auth/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.email');
Route::get('auth/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.reset');
Route::post('auth/password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset.action');

Route::get('auth/s/{provider}', 'Auth\SocialController@login')->name('auth.social');
Route::get('auth/s/{provider}/callback', 'Auth\SocialController@callback');

Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
Route::post('auth/register', 'Auth\RegisterController@register')->name('auth.register.post');

Route::get('auth/confirmation/{token}', 'Auth\ConfirmController@confirm')
    ->name('auth.confirmation.confirm');

Route::get('profile/search', 'ProfileController@search')
    ->name('profile.search');

Route::resource('profile', 'ProfileController', [
    'only' => ['index', 'show', 'edit', 'update', 'delete'],
]);

Route::get('news/tag/{tag}', 'NewsController@tag')
    ->name('news.tag');

Route::resource('news', 'NewsController', [
    'only' => ['index', 'show'],
]);

Route::get('search/users/{search}', function (string $search) {
    return \App\Models\User::search($search)->get();
})->name('search.index');

Route::get('about', 'AboutController@about')->name('about');
Route::get('partners', 'AboutController@partners')->name('about.partners');

Route::get('contacts', 'AboutController@contacts')->name('about.contacts');
Route::post('feedback', 'AboutController@feedback')->name('about.feedback');

Route::get('teams/search', 'TeamsController@search')
    ->name('teams.search');

Route::post('teams/{team}/accept', 'TeamsController@accept')
    ->name('teams.accept');

Route::post('teams/{team}/reject', 'TeamsController@reject')
    ->name('teams.reject');

Route::post('teams/{team}/join', 'TeamsController@join')
    ->name('teams.join');

Route::post('teams/{team}/leave', 'TeamsController@leave')
    ->name('teams.leave');

Route::resource('teams', 'TeamsController');

Route::get('tournaments/search', 'TournamentsController@search')
    ->name('tournaments.search');

Route::resource('tournaments', 'TournamentsController', [
    'only' => ['index', 'show'],
]);
