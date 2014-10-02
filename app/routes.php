<?php
Route::get('/', ['as' => 'login', 'uses' => 'LoginController@getIndex']);
Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@getLoginform']);
Route::controller('login', 'LoginController');
Route::group(array('prefix' => 'backends'	, 'before' => 'auth'), function(){
	Route::controller('dashboard'			, 'AdminDashboardController');
	Route::controller('quizz'				, 'AdminQuizzController');
	Route::controller('users'				, 'AdminUsersController');
	Route::get('/logout'					, 'LoginController@getLogout');
});