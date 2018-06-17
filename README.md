# Modular Genealogy Software
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

![Github All Releases](https://img.shields.io/github/downloads/modularsoftware/genealogy/total.svg)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/modularsoftware/genealogy/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/modularsoftware/genealogy/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/modularsoftware/genealogy/badges/build.png?b=master)](https://scrutinizer-ci.com/g/modularsoftware/genealogy/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/modularsoftware/genealogy/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![StyleCI](https://github.styleci.io/repos/135390590/shield?branch=master)](https://github.styleci.io/repos/135390590)

[![Waffle.io - Columns and their card count](https://badge.waffle.io/modularsoftware/Genealogy.svg?columns=all)](https://waffle.io/modularsoftware/genealogy)

[![CodeFactor](https://www.codefactor.io/repository/github/modularsoftware/genealogy/badge/master)](https://www.codefactor.io/repository/github/modularsoftware/genealogy/overview/master)
[![codebeat badge](https://codebeat.co/badges/911f9e33-212a-4dfa-a860-751cdbbacff7)](https://codebeat.co/projects/github-com-modulargenealogy-genealogy-master)
[![BCH compliance](https://bettercodehub.com/edge/badge/modularsoftware/genealogy?branch=master)](https://bettercodehub.com/)
[![Build Status](https://travis-ci.org/modularsoftware/genealogy.svg?branch=master)](https://travis-ci.org/modularsoftware/genealogy)


## Description

Free and open source browser based genealogy software which can be installed locally or on any supported server.

Features include all the standard application features plus 
management of individuals and families. Sources, citations, repositories,
rendering of tree displays, events, contacts, documents, addresses,.

Currently under development and feedback welcome.


### Developer Installation

1. Download the project with `git clone https://github.com/modularsoftware/genealogy.git`

2. Run in the project folder `composer install`

3. Copy `.env.example` to `.env` and Configure the `.env` file. 

4. Run `php artisan key:generate`

5. Run `php artisan migrate --seed`

6. `npm install && npm run dev` / `hmr` /...

7. Login into the project with user: `admin@example.net`, password: `password`


### Docker Support 

Open `DOCKER.md` file for information


### Important

If you are using this project please consult the **[changelog](https://github.com/modularsoftware/genealogy/blob/master/CHANGELOG.md)** on every update.

### Based on Laravel Enso
A solid starting project, based on [Laravel](https://laravel.com) 5.6, [VueJS](https://vuejs.org) 2, 
[Bulma](https://bulma.io), integrated themes from [Bulmaswatch](https://jenil.github.io/bulmaswatch), 
all the VueJS goodies such as [Vuex](https://vuex.vuejs.org/en) and [VueRouter](https://router.vuejs.org/en), 
with features like: 

Read more information in the `ENSO-README.md` 

Built with with &#10084;. Crafted on Laravel 5.6.x, Bulma 0.7.x, Vuejs 2.5.x and:

[Vue Router](https://router.vuejs.org/en), [Vuex](https://vuex.vuejs.org/en/), [Axios](https://github.com/axios/axios),
[Font awesome 5](https://fontawesome.com), [Animate.css](https://daneden.github.io/animate.css/), 
[Bulmaswatch](https://jenil.github.io/bulmaswatch), [Bulma-Extensions](https://wikiki.github.io/bulma-extensions/overview),
[Nprogress.js](http://ricostacruz.com/nprogress), [Vue-multiselect](https://github.com/monterail/vue-multiselect),
[Intro.js](http://introjs.com/),  [Chart.js](http://chartjs.org), [Flatpickr](https://chmln.github.io/flatpickr/), 

Special thanks to [Laravel Enso](https://github.com/laravel-enso) [Taylor Otwell](https://laravel.com/), [Jeffrey Way](https://laracasts.com), [Evan You](https://vuejs.org/) and [Jeremy Thomas](https://bulma.io).


### Contributions

We will consider any pull requests and feature suggestions.

### License

This package is released under the MIT license.