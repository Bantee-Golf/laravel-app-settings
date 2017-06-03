# Laravel Settings

Save app settings to database and retrieve them. Supports Laravel 5.4

### Installation Instructions

Add the repository to `composer.json`
```
"repositories": [
	{
	    "type":"vcs",
	    "url":"git@bitbucket.org:elegantmedia/laravel-app-settings.git"
	}
]
```

```
composer require emedia/app-settings
```


## Configuration

1. Update `config\app.php` and add these.
```
\\ In the service providers
	EMedia\AppSettings\AppSettingsServiceProvider::class,

\\ For aliases
	'Setting' => EMedia\AppSettings\Facades\Setting::class,
```

2. Setup the package
```
php artisan emedia:setup.app-settings-package
```

3. Run the migrations
```
php artisan migrate
```

4. (Optional) If you need custom views, publish the views
```
php artisan vendor:publish --tag=app-settings-views
```

## Usage

```
// Settings a setting
setting_set('mySetting', '3445');

// or use the Facade
{{ Setting::set('mySetting', '3445') }}

// Retrieving a setting
setting('mySetting', 'default');

// or use the Facade
{{ Setting::get('mySetting') }}

// Updade a setting
{{ Setting::update('mySetting', '3445') }}

// View 'SettingsManager' class for other functions
```