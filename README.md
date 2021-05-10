# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/github/workflow/status/cakephp/app/CakePHP%20App%20CI/master?style=flat-square)](https://github.com/cakephp/app/actions)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%207-brightgreen.svg?style=flat-square)](https://github.com/phpstan/phpstan)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 4.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit the environment specific `config/app_local.php` and setup the
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.

## Layout

The app skeleton uses [Milligram](https://milligram.io/) (v1.3) minimalist CSS
framework by default. You can, however, replace it with any other library or
custom styles.

## Sobre tarea de prueba (screens)

1. Login

![Laravel_Logo](https://github.com/makklays/cakephp/blob/main/webroot/img/cake_login.png)
<img scr="/img/cake_login.png" style="width:600px;" />

2. All tasks

![Laravel_Logo](https://github.com/makklays/cakephp/blob/main/webroot/img/cake_all.png)
<img scr="/webroot/img/cake_all.png" style="width:600px;" />

3. Add task

<img scr="https://github.com/makklays/cakephp/blob/main/webroot/img/cake_add.png" style="width:600px;" />

4. View task

<img scr="https://github.com/makklays/cakephp/blob/main/webroot/img/cake_view.png" style="width:600px;" />

5. Edit task

<img scr="https://github.com/makklays/cakephp/blob/main/webroot/img/cake_delete.png" style="width:600px;" />

6. Delete task

<img scr="login.png" style="width:600px;" />



