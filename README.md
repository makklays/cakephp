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

![cake_Logo](https://github.com/makklays/cakephp/blob/main/webroot/img/cake_login.png)
![cake_Logo](https://github.com/makklays/cakephp/blob/main/webroot/img/cake_login2.png)
![cake_Logo](https://github.com/makklays/cakephp/blob/main/webroot/img/cake_users.png)

2. All tasks

![cake_Logo](https://github.com/makklays/cakephp/blob/main/webroot/img/cake_all.png)

3. Add task

![cake_Logo](https://github.com/makklays/cakephp/blob/main/webroot/img/cake_add.png)

4. View task

![cake_Logo](https://github.com/makklays/cakephp/blob/main/webroot/img/cake_view.png)

5. Edit task

![cake_Logo](https://github.com/makklays/cakephp/blob/main/webroot/img/cake_edit.png)

6. Delete task

![cake_Logo](https://github.com/makklays/cakephp/blob/main/webroot/img/cake_delete.png)

DESCRIPTION
It is necessary to make a small web application that contains a form with a small
design with the following elements:
- Name field: the user must only be able to enter letters
- Mail field: validate that a mail is a mail
- Description field: free text
- Address field: address text
- CP field: CP format

  This data must be sent to a Backend that will normalize and validate the data
  and save it in DB. Backend will save encrypted user password when they
  register.
  Then the user must be able to login and list his registered tasks from the form,
  to do this it is necessary that the Backend can request the data from the DB and
  prepare them so that the Front can make use of this data. It is necessary to
  make Front to show the user's data.

## Para base de datos

CREATE DATABASE `cakephpdb` character set utf8 collate utf8_general_ci ;

    CREATE TABLE `tasks` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(12) NOT NULL,
    `name` varchar(50) DEFAULT NULL,
    `email` varchar(50) DEFAULT NULL,
    `description` text DEFAULT NULL,
    `address` text DEFAULT NULL,
    `cp` varchar(255) DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8

    CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(50) DEFAULT NULL,
    `password` varchar(255) NOT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `email` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8

    UPDATE cakephpdb.tasks SET user_id = 1, name = 'Alexander', email = 'alexander.kuziv@makklays.com', description = 'Programmar', address = 'España', cp = 'Que es CP?', created = '2021-05-08 21:39:47', modified = '2021-05-08 21:39:50' WHERE id = 1;
    UPDATE cakephpdb.tasks SET user_id = 1, name = 'Sara Alfonso', email = 'sara.alfonso@makklays.com', description = 'Crea el desaño para sitio web :-)))', address = 'Italy, street Stroiteley, 8 ', cp = 'qwerty', created = '2021-05-09 09:52:23', modified = '2021-05-10 04:11:05' WHERE id = 2;
    UPDATE cakephpdb.tasks SET user_id = 1, name = 'Federico Metro', email = 'federico.metro@gmail.com', description = 'Voy a comida e iglesia en semana que viene - por ejemplo', address = 'España, villa Metro ', cp = 'no se ¿por qué hay que este campo?', created = '2021-05-09 09:54:39', modified = '2021-05-10 04:12:23' WHERE id = 3;
    UPDATE cakephpdb.tasks SET user_id = 3, name = 'Nastya ', email = 'nastya@makklays.com', description = 'vivo', address = 'España', cp = 'no se ¿por qué hay que este campo?', created = '2021-05-09 10:40:09', modified = '2021-05-09 10:40:09' WHERE id = 5;
    UPDATE cakephpdb.tasks SET user_id = 3, name = 'Nastya ', email = 'nastya@makklays.com', description = 'vivo', address = 'España', cp = 'no se ¿por qué hay que este campo?', created = '2021-05-09 10:40:26', modified = '2021-05-09 10:40:26' WHERE id = 6;
    UPDATE cakephpdb.tasks SET user_id = 3, name = 'Alexander', email = 'admin@admin.com', description = 'maquinarse', address = 'no se', cp = 'vagina', created = '2021-05-09 15:47:34', modified = '2021-05-09 15:53:49' WHERE id = 7;
    UPDATE cakephpdb.tasks SET user_id = 3, name = 'HHRR', email = 'hhrr@admin.com', description = '', address = '', cp = '', created = '2021-05-09 20:53:20', modified = '2021-05-09 20:53:20' WHERE id = 14;
    UPDATE cakephpdb.tasks SET user_id = 1, name = 'Alejandro', email = 'alexxxxander.kuziv@makklays.com', description = 'Programma la tarea de Epic-18 (SPRINT 8)', address = 'España, Barcelona', cp = 'code pin', created = '2021-05-10 02:35:18', modified = '2021-05-10 04:14:36' WHERE id = 15;
    UPDATE cakephpdb.tasks SET user_id = 1, name = 'Alejandro Iglesias', email = 'alejandro.iglesias@makklays.com', description = 'Programmar sitio web :-) y se maquina las páginas web para SinglePage Site', address = 'España, Deben', cp = 'no se ¿por qué hay que este campo?', created = '2021-05-10 02:36:24', modified = '2021-05-10 04:17:30' WHERE id = 16;
    UPDATE cakephpdb.tasks SET user_id = 1, name = 'Werwer', email = 'werwer@makklays.com', description = 'wear wer', address = 'qweqwe', cp = 'qwewerwer', created = '2021-05-10 04:19:30', modified = '2021-05-10 04:20:22' WHERE id = 17;

    UPDATE cakephpdb.users SET name = 'Alexander', password = '$2y$10$4t0/PJF7coYuyFvhiJUgduFi44WOYzgq1b0pD0H3Yk8vj6GB30zb6', created = '2021-05-08 21:20:23', modified = '2021-05-08 21:20:25', email = 'alexander.kuziv@makklays.com' WHERE id = 1;
    UPDATE cakephpdb.users SET name = 'Alexander AAA', password = '$2y$10$4t0/PJF7coYuyFvhiJUgduFi44WOYzgq1b0pD0H3Yk8vj6GB30zb6', created = '2021-05-09 12:39:56', modified = '2021-05-09 12:39:59', email = 'alejandro.kuziv@makklays.com' WHERE id = 3;
    UPDATE cakephpdb.users SET name = null, password = '$2y$10$CuSwbeHgMt4RvXISxzQHLOH9aj7K0T12qm2f60ghdXZZOutcEeJpy', created = '2021-05-10 01:30:05', modified = '2021-05-10 01:30:05', email = 'alexander2.kuziv@makklays.com' WHERE id = 4;

    // para Login
    email = alexander.kuziv@makklays.com
    password = 123123123
