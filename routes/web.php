<?php

Route::group(['prefix' => 'settings', 'middleware' => ['web', 'auth']], function()
{
	Route::get('/', 'EMedia\AppSettings\Http\Controllers\SettingsController@index')->name('settings');
	Route::get('/new', 'EMedia\AppSettings\Http\Controllers\SettingsController@create');
	Route::get('/{id}/edit', 'EMedia\AppSettings\Http\Controllers\SettingsController@edit')->name('settings.edit');

	Route::post('/', 'EMedia\AppSettings\Http\Controllers\SettingsController@store');
	Route::put('/{id}', 'EMedia\AppSettings\Http\Controllers\SettingsController@update')->name('settings.entity');
	Route::delete('/{id}', 'EMedia\AppSettings\Http\Controllers\SettingsController@destroy');
});