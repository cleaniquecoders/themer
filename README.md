
[![Build Status](https://travis-ci.org/cleaniquecoders/themer.svg?branch=master)](https://travis-ci.org/cleaniquecoders/themer) [![Latest Stable Version](https://poser.pugx.org/cleaniquecoders/themer/v/stable)](https://packagist.org/packages/cleaniquecoders/themer) [![Total Downloads](https://poser.pugx.org/cleaniquecoders/themer/downloads)](https://packagist.org/packages/cleaniquecoders/themer) [![License](https://poser.pugx.org/cleaniquecoders/themer/license)](https://packagist.org/packages/cleaniquecoders/themer)


## Laravel Theme Maker

A simple Laravel Theme Maker, enabled developers to create theme skeleton. Developers just need to add the middleware of themer after creating themes.

## Installation

Run the following command to install the package:

```
composer require cleaniquecoders/themer
```

## Register

### Themer Service Provider

Register Themer service provider at `config/app.php` in `providers` key:

```php
CleaniqueCoders\Themer\ThemerServiceProvider::class,
```

### Themer Middleware

Register Themer middleware at the `app/Http/Kernel.php` in `$routeMiddleware`:

```php
'theme' => \CleaniqueCoders\Themer\Http\Middleware\ThemeLoader::class,
```

## Usage

### Create a new theme skeleton

```
php artisan make:theme your-theme-name
```

### Assign theme via middleware

```php
Route::get('home','HomeController@index')->middleware('theme:public');
```

OR 

```php
Route::group(['middleware' => ['theme:admin']], function(){
	Auth:routes();
});
```

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).