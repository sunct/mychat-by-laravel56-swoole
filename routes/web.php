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
Route::get('/about','IndexController@about');

Auth::routes();
//Route::get('/sendActivationMail','Auth\RegisterController@sendMail');
//Route::get('/activeAccount','Auth\RegisterController@activeMail');

Route::get('verification/{token}', 'Auth\RegisterController@getVerification');

Route::get('emails/verification-result/success', 'EmailVerificationController@emailsVerificationSuccess')->middleware("auth");

//Route::group(['middleware' => ['isVerified']], function () {
//    Route::get('verification/{token}', 'Auth\RegisterController@getVerification');

    Route::get('/home', 'HomeController@index')->name('home');
//});

Route::post('/emailVerify', 'Auth\RegisterController@emailVerify')->name('emailVerify');
