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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('signup', 'Auth\RegisterController@register');

// E-Mail Verification Routes...
// Route::get('verification/resend', 'Auth\VerificationController@resend')->name('verification.resend');
// Route::get('verification', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('verification/{id}', 'Auth\VerificationController@verify')->name('verification.verify');

// Password Reset Routes...
Route::post('password-reset/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('password-reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('password-reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('password-reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

// Page Routes...
Route::get('/', 'HomeController@index')->name('home');

// Administrator Routes...
Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware(['auth', 'permission:view backend'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
});
