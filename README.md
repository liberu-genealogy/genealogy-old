## Genealogy - Open Source Family Tree Software - Laravel 10 backend
 ![Latest Stable Version](https://img.shields.io/github/release/cgdsoftware/genealogy.svg) 
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/laravel-liberu/genealogy/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/laravel-liberu/genealogy/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/laravel-liberu/genealogy/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![StyleCI](https://github.styleci.io/repos/135390590/shield?branch=master)](https://github.styleci.io/repos/135390590)
[![CodeFactor](https://www.codefactor.io/repository/github/familytree365/genealogy/badge/master)](https://www.codefactor.io/repository/github/familytree365/genealogy/overview/master)
[![codebeat badge](https://codebeat.co/badges/911f9e33-212a-4dfa-a860-751cdbbacff7)](https://codebeat.co/projects/github-com-modulargenealogy-genealogy-master)
[![CircleCI](https://circleci.com/gh/laravel-liberu/genealogy.svg?style=svg)](https://circleci.com/gh/laravel-liberu/genealogy)

<!--/h-->
### Description
* Genealogy is a browser-based application which makes it easier than ever for you to collect and process genealogical data. It uses a Laravel 10 backend with PHP 8.2 and the Laravel Liberu module collection. 
* You can create a family tree of your own either by importing data in any of several standard formats, or by manually entering the data yourself. 
* We offer full API support for many family tree database and records forms. You can, for example, import and export Gedcom data and DNA matching results. 
* Smart Matching is coming soon – allowing you to connect easily to resources on other servers. 
* Your data is securely stored on our server, and will never leave your environment without your permission. 
* Data tables support comprehensive CRUD information.
* Our forms are easy to modify.
* The client can be found at https://github.com/liberu-ui/genealogy.
<!--/h-->
## Demo
https://www.familytree365.com - register a free account, and try the demo with no charge or obligation. 
<!--/h-->
## Official Laravel Liberu Documentation
Both frontend and backend documentation are available here. Most sections include short demo clips.

<!--/h-->

### Installation Steps

1. Download the project with `git clone https://github.com/laravel-liberu/genealogy.git`

2. Copy .env.example to .env and edit details

3. `composer install` or on Windows you need to use `composer install --ignore-platform-reqs`

4. `php artisan key:generate`

5. `php artisan serve` 
In order to serve the back-end API, take a look at the Local Development Server section of the [Laravel installation documentation](https://laravel.com/docs/6.x/#installation)
and consider using [Valet](https://laravel.com/docs/6.x/valet) for a better experience

6. Run `php artisan migrate --seed`

7. Follow installation steps for client side (https://github.com/liberu-ui/genealogy) and launch the site and log into the project with user: `admin@familytree365.com`, password: `password`

8. (optional) Setup the configuration files as needed, in `config/enso/*.php`

9. (maybe required) Setup sanctum stateful domains in `.env` and add your domains to `config/cors.php`

<!--/h-->
## Import test data

1. Make sure php artisan queue:work is running

2. Make sure root database user is being used.

3. Register a new user and login.

4. Go to gedcom / import and upload https://github.com/cgdsoftware/public-gedcoms/blob/master/files/royal92.ged

<!--/h-->
## Broadcasting Setup

```bash
# install dependencies
$ npm install -g laravel-echo-server

$ laravel-echo-server configure
$ nano .env

  BROADCAST_DRIVER=redis
  REDIS_PREFIX=

$ laravel-echo-server start
```

If you want to keep it in background process you should install supervisor.

<!--h-->
### Contributions

New contributions are welcome! Pull requests are great, but issues are good too.

### License

This package is released under the MIT license.
<!--/h-->
