<?php
Route::group(['middleware' => 'web'], function ()
{
	Route::any('onboarding/{key}/purchase','Citw\Loan365\Http\Controllers\guest@purchase');
	Route::any('onboarding/{key}/remortgage','Citw\Loan365\Http\Controllers\guest@purchase');
	Route::any('onboarding/{key}','Citw\Loan365\Http\Controllers\guest@purchase');
	Route::any('login','Citw\Loan365\Http\Controllers\Auth\LoginController@getLoginForm');
	Route::any('register','Citw\Loan365\Http\Controllers\Auth\RegisterController@getRegisterForm');
	Route::any('saveregister','Citw\Loan365\Http\Controllers\Auth\RegisterController@saveRegisterForm');
	Route::any('authenticate','Citw\Loan365\Http\Controllers\Auth\LoginController@authenticate');
	Route::any('dashboard','Citw\Loan365\Http\Controllers\dashboardController@dashboard');
	Route::any('logout','Citw\Loan365\Http\Controllers\Auth\LoginController@getLogout');
	/*Route::get('logout/coach', 'Dexel\Authentication\Http\Controllers\Admin\LoginController@getLogout');
	Route::get('logout', 'Dexel\Authentication\Http\Controllers\User\LoginController@getLogout');
	Route::get('auth/redirect/{provider}', 'Dexel\Authentication\Http\Controllers\User\LoginController@redirectToProvider');
  	Route::get('auth/handle/{provider}', 'Dexel\Authentication\Http\Controllers\User\LoginController@handleProviderCallback');
	Route::group(['middleware' => 'guest:coach'], function ()
	{

		Route::get('register/coach', 'Dexel\Authentication\Http\Controllers\Admin\RegisterController@getRegisterForm');
		Route::post('register/coach', 'Dexel\Authentication\Http\Controllers\Admin\RegisterController@saveRegisterForm');
		Route::get('activate/coach/account/{token}', 'Dexel\Authentication\Http\Controllers\Admin\RegisterController@activateuser');

		Route::get('login/coach', 'Dexel\Authentication\Http\Controllers\Admin\LoginController@getLoginForm');
		Route::post('login/coach', 'Dexel\Authentication\Http\Controllers\Admin\LoginController@authenticate');


		Route::get('register', 'Dexel\Authentication\Http\Controllers\User\RegisterController@getRegisterForm');
		Route::post('register', 'Dexel\Authentication\Http\Controllers\User\RegisterController@saveRegisterForm');
		Route::get('activate/user/account/{token}', 'Dexel\Authentication\Http\Controllers\User\RegisterController@activateuser');

		Route::get('login', 'Dexel\Authentication\Http\Controllers\User\LoginController@getLoginForm');
		Route::post('login', 'Dexel\Authentication\Http\Controllers\User\LoginController@authenticate');

		Route::get('forgot', 'Dexel\Authentication\Http\Controllers\User\ForgotPasswordController@index');
		Route::post('forgot', 'Dexel\Authentication\Http\Controllers\User\ForgotPasswordController@postForgot');

		Route::get('reset/user/{token}', 'Dexel\Authentication\Http\Controllers\User\ForgotPasswordController@getReset');
		Route::post('reset/user/{token}', 'Dexel\Authentication\Http\Controllers\User\ForgotPasswordController@postReset');

		Route::get('forgot/coach', 'Dexel\Authentication\Http\Controllers\Admin\ForgotPasswordController@index');
		Route::post('forgot/coach', 'Dexel\Authentication\Http\Controllers\Admin\ForgotPasswordController@postForgot');

		Route::get('reset/coach/{token}', 'Dexel\Authentication\Http\Controllers\Admin\ForgotPasswordController@getReset');
		Route::post('reset/coach/{token}', 'Dexel\Authentication\Http\Controllers\Admin\ForgotPasswordController@postReset');
	});
	Route::group(['middleware' => 'coach'], function ()
	{
		Route::get('coach/myprofile', 'Dexel\Authentication\Http\Controllers\Admin\LoginController@getProfile');
		Route::post('coach/myprofile', 'Dexel\Authentication\Http\Controllers\Admin\LoginController@postProfile');
	});
	Route::group(['middleware' => 'user'], function ()
	{
		Route::get('myprofile', 'Dexel\Authentication\Http\Controllers\User\LoginController@getProfile');
		Route::post('myprofile', 'Dexel\Authentication\Http\Controllers\User\LoginController@postProfile');
	});*/
});