<?php

if (!function_exists('setting'))
{
	/**
	 *
	 * Helper function for the setting facade
	 *
	 * @param        $key
	 * @param string $default
	 */
	function setting($key, $default = '')
	{
		\EMedia\AppSettings\Facades\Setting::get($key, $default);
	}
}


if (!function_exists('setting_set'))
{
	/**
	 *
	 * Helper function to set a setting
	 *
	 * @param      $key
	 * @param      $value
	 * @param null $dataType
	 * @param null $description
	 */
	function setting_set($key, $value, $dataType = null, $description = null)
	{
		\EMedia\AppSettings\Facades\Setting::setOrUpdate($key, $value, $dataType, $description);
	}
}

if (!function_exists('setting_forget'))
{
	/**
	 *
	 * Delete a setting
	 *
	 * @param      $key
	 */
	function setting_forget($key)
	{
		\EMedia\AppSettings\Facades\Setting::forget($key);
	}
}
