<?php

// Start AppSettings Routes
Route::group(['prefix' => '/manage/settings', 'middleware' => ['auth', 'auth.acl:roles[super-admins|admins|developers]'], 'as' => 'manage.'], function()
{
	Route::get('/', '\EMedia\AppSettings\Http\Controllers\Manage\ManageSettingsController@index')->name('settings.index');
	Route::get('/new', '\EMedia\AppSettings\Http\Controllers\Manage\ManageSettingsController@create')->name('settings.create');
	Route::get('/{id}/edit', '\EMedia\AppSettings\Http\Controllers\Manage\ManageSettingsController@edit')->name('settings.edit');

	Route::post('/', '\EMedia\AppSettings\Http\Controllers\Manage\ManageSettingsController@store')->name('settings.store');
	Route::put('/{id}', '\EMedia\AppSettings\Http\Controllers\Manage\ManageSettingsController@update')->name('settings.update');
	Route::delete('/{id}', '\EMedia\AppSettings\Http\Controllers\Manage\ManageSettingsController@destroy')->name('settings.destroy');
});
// End AppSettings Routes
