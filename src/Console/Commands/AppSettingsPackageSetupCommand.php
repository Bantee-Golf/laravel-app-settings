<?php
namespace EMedia\AppSettings\Console\Commands;

use EMedia\Helpers\Console\Commands\Packages\BasePackageSetupCommand;
use EMedia\PHPHelpers\Files\FileEditor;

class AppSettingsPackageSetupCommand extends BasePackageSetupCommand
{

	protected $signature = 'setup:package:app-settings';
	protected $description = 'Setup the App Settings package';
	protected $packageName = 'App Settings';

	protected $updateRoutesFile = true;

	protected function generateMigrations()
	{
		$this->copyMigrationFile(__DIR__, '001_create_settings_table.php', \CreateSettingsTable::class);
	}

	protected function generateSeeds()
	{
		$this->copySeedFile(__DIR__, 'SettingsTableSeeder.php', \SettingsTableSeeder::class);
	}

}