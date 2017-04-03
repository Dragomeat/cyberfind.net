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
Route::get('/home', 'HomeController@index');

Route::get('/auth/login', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::post('/auth/login', 'Auth\LoginController@login')->name('auth.login.post');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::get('/auth/s/{provider}', 'Auth\SocialController@login')->name('auth.social');
Route::get('/auth/s/{provider}/callback', 'Auth\SocialController@callback');

Route::resource('profile', 'ProfileController', [
    'only' => ['show', 'edit', 'update'],
]);

Route::get('/auth/register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');

// // Authentication Routes...
//        $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//        $this->post('login', 'Auth\LoginController@login');
//        $this->post('logout', 'Auth\LoginController@logout')->name('logout');
//
//        // Registration Routes...
//        $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//        $this->post('register', 'Auth\RegisterController@register');
//
//        // Password Reset Routes...
//        $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//        $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//        $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//        $this->post('password/reset', 'Auth\ResetPasswordController@reset');
