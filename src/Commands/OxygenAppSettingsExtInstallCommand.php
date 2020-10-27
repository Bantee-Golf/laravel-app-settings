<?php


namespace EMedia\AppSettings\Commands;


use EMedia\AppSettings\AppSettingsServiceProvider;

class OxygenAppSettingsExtInstallCommand extends \ElegantMedia\OxygenFoundation\Console\Commands\ExtensionInstallCommand
{

	protected $signature = 'oxygen:ext:app-settings:install';

	protected $description = 'Setup the App Settings package';

	public function getExtensionServiceProvider(): string
	{
		return AppSettingsServiceProvider::class;
	}

	public function getExtensionDisplayName(): string
	{
		return 'App Settings';
	}
}
