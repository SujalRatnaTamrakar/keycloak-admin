# Laravel Keycloak Admin Package

This package is still in development.

## Development Documentation

Development has been following the documentation available at the following URL:
- [Keycloak REST API Documentation 22.0.1](https://www.keycloak.org/docs-api/22.0.1/rest-api/index.html)

## Covered APIs

### User APIs

- `GET /admin/realms/{realm}/users/count`
- `GET /admin/realms/{realm}/users`
- `POST /admin/realms/{realm}/users`
- `GET /admin/realms/{realm}/users/profile`
- `GET /admin/realms/{realm}/users/profile/metadata`
- `DELETE /admin/realms/{realm}/users/{user-id}`
- `POST /admin/realms/{realm}/users/{user-id}/logout`
- `PUT /admin/realms/{realm}/users/{user-id}`
- `PUT /admin/realms/{realm}/users/{user-id}/reset-password`
- `GET /admin/realms/{realm}/users/{id}/sessions`

## TODO

- Return proper responses
- Refactor repeating responses
- 
# A laravel package for handling Keycloak Admin REST API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sujalratnatamrakar/keycloak-admin.svg?style=flat-square)](https://packagist.org/packages/sujalratnatamrakar/keycloak-admin)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/sujalratnatamrakar/keycloak-admin/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/sujalratnatamrakar/keycloak-admin/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/sujalratnatamrakar/keycloak-admin/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/sujalratnatamrakar/keycloak-admin/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/sujalratnatamrakar/keycloak-admin.svg?style=flat-square)](https://packagist.org/packages/sujalratnatamrakar/keycloak-admin)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/keycloak-admin.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/keycloak-admin)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require sujalratnatamrakar/keycloak-admin
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="keycloak-admin-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="keycloak-admin-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="keycloak-admin-views"
```

## Usage

```php
$keycloakAdmin = new SujalRatnaTamrakar\KeycloakAdmin();
echo $keycloakAdmin->echoPhrase('Hello, Sujal Ratna Tamrakar!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Sujal Ratna Tamrakar](https://github.com/sujalratnatamrakar)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
