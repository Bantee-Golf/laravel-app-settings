<?php
namespace EMedia\AppSettings;

class Facade extends \Illuminate\Support\Facades\Facade
{

	protected static function getFacadeAccessor()
	{
		return 'EMedia\AppSettings\SettingsManager';
	}

}