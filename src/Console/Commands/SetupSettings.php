<?php
namespace EMedia\AppSettings\Console\Commands;

use EMedia\Helpers\Console\Commands\BasePackageSetupCommand;


class SetupSettings extends BasePackageSetupCommand
{

	protected $signature = 'emedia:setup.app-settings-package';
	protected $description = 'Setup the App Settings package from EMedia';

	protected function generateMigrations()
	{
		$this->copyMigrationFile(__DIR__, '001_create_settings_table.php', \CreateSettingsTable::class);
	}

	protected function generateSeeds()
	{
		$this->copySeedFile(__DIR__, 'SettingsTableSeeder.php', \SettingsTableSeeder::class);
	}

}