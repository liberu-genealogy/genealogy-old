# Modular Genealogy Software
 ![Latest Stable Version](https://img.shields.io/github/release/modularsoftware/genealogy.svg) 
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/modularsoftware/genealogy/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/modularsoftware/genealogy/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/modularsoftware/genealogy/badges/build.png?b=master)](https://scrutinizer-ci.com/g/modularsoftware/genealogy/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/modularsoftware/genealogy/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![StyleCI](https://github.styleci.io/repos/135390590/shield?branch=master)](https://github.styleci.io/repos/135390590)
[![CodeFactor](https://www.codefactor.io/repository/github/modularsoftware/genealogy/badge/master)](https://www.codefactor.io/repository/github/modularsoftware/genealogy/overview/master)
[![codebeat badge](https://codebeat.co/badges/911f9e33-212a-4dfa-a860-751cdbbacff7)](https://codebeat.co/projects/github-com-modulargenealogy-genealogy-master)
[![Build Status](https://travis-ci.org/modularsoftware/genealogy.svg?branch=master)](https://travis-ci.org/modularsoftware/genealogy)


## Description

Browser based Genealogy software for interacting and processing data efficiently. Easily create your
own family tree by importing your existing data or manual data entry. Storage of all data is securely on your own server and does
not leave your environment without your permission. In the future there will be optional
smart matching with other servers.

<!--h-->
### Official Laravel Enso Documentation

The documentation is available [here](https://docs.laravel-enso.com) split into backend and frontend.
Note that most sections have short demo clips.

<!--/h-->

### Installation Steps

1. Download the project with `git clone --depth 1 https://github.com/modularsoftware/genealogy.git`

2. Run in the project folder `composer install`

3. Configure the `.env` file. Run `php artisan key:generate`

4. Run `php artisan migrate --seed`

5. Login into the project with user: `admin@laravel-enso.com`, password: `password`

6. (optional) Setup the configuration files as needed, in `config/enso/*.php`

7. (optional) `npm install` / `npm run dev` / `hmr` /...

Enjoy!


### Thanks

Built with Laravel Enso 3.x which is crafted on Laravel 6.0.x, Bulma, Vuejs 2 and:

[Vue Router](https://router.vuejs.org/en), [Vuex](https://vuex.vuejs.org/en/), [Axios](https://github.com/axios/axios),
[Font awesome 5](https://fontawesome.com), [Animate.css](https://daneden.github.io/animate.css/), 
[Bulma-Extensions](https://wikiki.github.io/bulma-extensions/overview), [Driver.js](https://kamranahmed.info/driver.js/),
[Chart.js](http://chartjs.org), [Flatpickr](https://chmln.github.io/flatpickr/), 

Special thanks to [Taylor Otwell](https://laravel.com/), [Jeffrey Way](https://laracasts.com), [Evan You](https://vuejs.org/) and [Jeremy Thomas](https://bulma.io). [Laravel Enso](https://github.com/laravel-enso)

<!--h-->
### Contributions

are welcome. Pull requests are great, but issues are good too.

### License

This package is released under the MIT license.
<!--/h-->
