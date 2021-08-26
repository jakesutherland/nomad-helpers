# Nomad Helpers

A WordPress PHP Composer package that provides helper functions and utilities that are used in other Nomad Composer Packages.

## Installation

You can install Nomad Helpers in your project by using composer.

```
$ composer require jakesutherland/nomad-helpers
```

## Documentation

Majority of the Nomad Helpers functions and utilities provided are fairly self explanatory and already well documented within the code-base.

Only the important stuff that you need to worry about is below.

### Nomad Environment

The `NOMAD_ENV` constant is used to determine the type of environment that your WordPress installation is running on. This should be defined in your `wp-config.php` file.

Possible values: `development` `staging` `production`

Default value: `production`

If you are building out your project locally on your computer, you'll want to configure your environment for development:

```
define( 'NOMAD_ENV', 'development' );
```

If you are testing your website in a staging environment:

```
define( 'NOMAD_ENV', 'staging' );
```

If your website is live, configure your environment for production:

```
define( 'NOMAD_ENV', 'production' );
```

It is highly recommended that you never have a live production website set to `development`.

### Nomad Debugging

The `NOMAD_DEBUG` constant is used to show additional debugging information when in a `development` environment. This should also be defined in your `wp-config.php` file.

```
define( 'NOMAD_DEBUG', true );
```

### Nomad Errors

While working on your project in a development environment, you may come across a Nomad Error. The purpose for Nomad Errors is to help steer you in the right direction when developing with Nomad features and utilities.

Nomad Errors will stop all processing and display error messages when `NOMAD_ENV` is set to `development`.

If `NOMAD_ENV` is set to `staging` or `production` then Nomad Errors will not be displayed.

IMPORTANT: If `NOMAD_ENV` is NOT defined and is NOT set to `development` you will not see any Nomad Error messages! The assumption is that, by default, you're on a production environment.

### Nomad Exceptions

Much different than Nomad Errors, Nomad Exceptions happen when the code cannot recover from itself and the application needs to stop processing. Something is broken.

Nomad Exceptions will be displayed regardless of your `NOMAD_ENV` setting.

## Changelog

### 1.1.0
* Updated constants (package is called Nomad Helpers, not Nomad Helper).
* Updated constants commenting to include context and version number it was added.
* Updated `nomad_error()` function comments to provide more context of expectations.
* Added `NOMAD_ENV` documentation to `README.md`.
* Added `NOMAD_HELPERS_SRC_PATH` constant.
* Added `NOMAD_DEBUG` constant (default `false`).
* Added `NOMAD_DEBUG` documentation to `README.md`.
* Added `Nomad_Exception` class.
* Added `Nomad_Exception` documentation to `README.md`.
* Added `nomad_error()` documentation to `README.md`.
* Added `nomad_array_keys_exist()` function.
* Added `nomad_array_keys_missing()` function.
* Added Changelog to `README.md`.

### 1.0.0
* Initial Release

## License

The MIT License (MIT). Please see [License File](https://github.com/jakesutherland/nomad-helpers/blob/master/LICENSE) for more information.

## Copyright

Copyright (c) 2021 Jake Sutherland
