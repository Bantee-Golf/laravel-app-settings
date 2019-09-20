# Laravel Settings

Save app settings to database and retrieve them. Supports Laravel 5.7 / 6.0

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

Setup the package
```
php artisan setup:package:app-settings
```

Run the migrations
```
php artisan migrate
```

(Optional) If you need custom views, publish the views
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
{{ Setting::get('mySetting', $default) }}

// Updade a setting
{{ Setting::update('mySetting', '3445') }}

// Set or Update a Setting
{{ Setting::setOrUpdate('mySetting', '3445') }}
```

### More Info

See the `SettingsManager` class to see how it works.


### Troubleshooting

The package should get auto-discovered with Laravel 5.7+. If not, add these to `config\app.php`.

```
\\ In the service providers
EMedia\AppSettings\AppSettingsServiceProvider::class,

\\ For aliases
'Setting' => EMedia\AppSettings\Facades\Setting::class,
```
