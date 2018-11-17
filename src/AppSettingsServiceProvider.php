<?php


namespace EMedia\AppSettings;


use EMedia\AppSettings\Console\Commands\AppSettingsPackageSetupCommand;
use EMedia\Helpers\Components\Menu\MenuBar;
use EMedia\Helpers\Components\Menu\MenuItem;
use EMedia\Helpers\Console\Commands\ComposerAutoload;
use Illuminate\Support\ServiceProvider;

class AppSettingsServiceProvider extends ServiceProvider
{

	public function boot()
	{
		$this->loadViewsFrom(__DIR__ . '/../resources/views', 'app-settings');

		$this->publishes([
			__DIR__ . '/../resources/views' => base_path('resources/views/vendor/app-settings'),
		], 'app-settings-views');

		// register the menu items
		$menuItem = (new MenuItem())->setText('Settings')
									->setResource('manage.settings.index')
									->setClass('fas fa-cogs');

		MenuBar::add($menuItem, 'sidebar.manage');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		if (!app()->environment('production')) {
			$this->commands(ComposerAutoload::class);
			$this->commands(AppSettingsPackageSetupCommand::class);
		}

		$this->app->singleton('EMedia\AppSettings\SettingsManager', SettingsManager::class);
	}
}