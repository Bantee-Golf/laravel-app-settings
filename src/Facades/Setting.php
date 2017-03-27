<?php
namespace EMedia\AppSettings\Facades;

class Setting extends \Illuminate\Support\Facades\Facade
{

	protected static function getFacadeAccessor()
	{
		return 'EMedia\AppSettings\SettingsManager';
	}

}