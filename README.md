## Family Tree 365 - Open Source Family Tree Software - Laravel 8 backend
 ![Latest Stable Version](https://img.shields.io/github/release/familytree365/genealogy.svg) 
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/familytree365/genealogy/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/familytree365/genealogy/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/familytree365/genealogy/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![StyleCI](https://github.styleci.io/repos/135390590/shield?branch=master)](https://github.styleci.io/repos/135390590)
[![CodeFactor](https://www.codefactor.io/repository/github/familytree365/genealogy/badge/master)](https://www.codefactor.io/repository/github/familytree365/genealogy/overview/master)
[![codebeat badge](https://codebeat.co/badges/911f9e33-212a-4dfa-a860-751cdbbacff7)](https://codebeat.co/projects/github-com-modulargenealogy-genealogy-master)
[![Build Status](https://travis-ci.com/curtisdelicata/genealogy.svg?branch=master)](https://app.travis-ci.com/github/curtisdelicata/genealogy)
[![CircleCI](https://circleci.com/gh/familytree365/genealogy.svg?style=svg)](https://circleci.com/gh/familytree365/genealogy)


## Description

Browser based Genealogy software for interacting and processing data efficiently. Easily create your
own family tree by importing your existing data or manual data entry. Storage of all data is securely on your own server and does
not leave your environment without your permission. API support for many databases of family tree records. In the future there will be optional
smart matching with other servers. This is the Laravel 8 backend using the Laravel Enso collection of modules. Please see https://github.com/familytree365/nuxt for the client.

Data tables for comphrensive amount of CRUD information. Forms easy to modify. Gedcom import and export. DNA matching. Subscriptions using Stripe and PayPal. APIs for various online databases of genealogical records.

## Demo

https://www.familytree365.com - register a free account

<!--h-->
### Official Laravel Enso Documentation

The documentation is available [here](https://docs.laravel-enso.com) split into backend and frontend.
Note that most sections have short demo clips.

<!--/h-->

### Installation Steps

1. Download the project with `composer create-project familytree365/genealogy`

2. In order to serve the back-end API, take a look at the Local Development Server section of the [Laravel installation documentation](https://laravel.com/docs/6.x/#installation)
and consider using [Valet](https://laravel.com/docs/6.x/valet) for a better experience

3. Run `php artisan migrate --seed`

4. Launch the site and log into the project with user: `admin@familytree365.com`, password: `password`

7. (optional) Setup the configuration files as needed, in `config/enso/*.php`

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

If you want to keep it in background proccess you should install pm2 or supervisor

### Thanks

Built with Laravel Enso 4.x which is crafted on Laravel 8.

Special thanks to [Taylor Otwell](https://laravel.com/), [Jeffrey Way](https://laracasts.com), [Evan You](https://vuejs.org/) and [Jeremy Thomas](https://bulma.io). [Laravel Enso](https://github.com/laravel-enso)

<!--h-->
### Contributions

are welcome. Pull requests are great, but issues are good too.

## Contributors

This project exists thanks to all the people who contribute. 
<a href="graphs/contributors"><img src="https://opencollective.com/genealogy/contributors.svg?width=890&button=false" /></a>


## Backers

Thank you to all our backers! 🙏 [[Become a backer](https://opencollective.com/genealogy#backer)]

<a href="https://opencollective.com/genealogy#backers" target="_blank"><img src="https://opencollective.com/genealogy/backers.svg?width=890"></a>


## Sponsors

Support this project by becoming a sponsor. Your logo will show up here with a link to your website. [[Become a sponsor](https://opencollective.com/genealogy#sponsor)]

<a href="https://opencollective.com/genealogy#sponsors" target="_blank"><img src="https://opencollective.com/genealogy/sponsors.svg?width=890"></a>
### License

This package is released under the MIT license.
<!--/h-->
