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


## License

The MIT License (MIT). Please see [License File](https://github.com/jakesutherland/nomad-helpers/blob/master/LICENSE) for more information.

## Copyright

Copyright (c) 2021 Jake Sutherland
