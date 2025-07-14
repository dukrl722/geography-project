<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Geography Project

Generic project to test geography features in Laravel (nothing special).

- Laravel 12
- PHP 8.4
- No database (maybe in the future)

### Onboarding

Let's start your onboarding process with the following steps:

1- Clone the repository
```bash'
git clone cloneurlhere (sorry, I'm too lazy to write it)
```
2- Install the PHP dependencies
```bash
composer install
```
3- Create .env file
```bash
cp .env.example .env
```
4- Generate the APP_KEY
```bash
php artisan key:generate
```
Or if you are using Laravel Sail:
```bash
vendor/bin/sail artisan key:generate
```

### Documentation

Yes, we have documentation! You can find it in route `/api/documentation` (Thanks Swagger creators!)

### Task Pattern

To keep a simple pattern for tasks, we will use the following structure:

```php
'feature/' // when we are working on a new feature
'enhancement/' // when we are improving an existing feature
'bugfix/' // when we are fixing a bug
'hotfix/' // when we are fixing a critical bug (probably it will never happen)
```
You wanna an example? Here it is:

```bash
git checkout -b feature/GPP-{task-count}
git checkout -b enhancement/GPP-{task-count}
git checkout -b bugfix/GPP-{task-count}
git checkout -b hotfix/GPP-{task-count}
```

That's all folks 🙏
