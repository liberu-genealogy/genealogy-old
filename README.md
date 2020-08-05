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

## Demo

https://genealogia.co.uk/ - register a free trial account

<!--h-->
### Official Laravel Enso Documentation

The documentation is available [here](https://docs.laravel-enso.com) split into backend and frontend.
Note that most sections have short demo clips.

<!--/h-->

### Installation Steps

1. Download the project with `git clone https://github.com/modularsoftware/genealogy.git --depth 1`

2. Within the project folder run `composer install`

3. Create a database for your site (see the [Laravel database documentation](https://laravel.com/docs/6.x/database)), 
copy or rename the `.env.example` file to `.env`, 
edit the database configuration information, and run `php artisan key:generate`

4. In order to serve the back-end API, take a look at the Local Development Server section of the [Laravel installation documentation](https://laravel.com/docs/6.x/#installation)
and consider using [Valet](https://laravel.com/docs/6.x/valet) for a better experience

5. Run `php artisan migrate --seed`

6. Open the `client` folder, copy the `.env.example` file, save it as `.env` and set the URL 
for the back-end API (which you've configured at step 4)

7. Run `yarn && yarn build`

8. Launch the site and log into the project with user: `admin@genealogia.co.uk`, password: `password`

9. For live reload / hot module replacement functionality run `yarn serve`

10. (optional) Setup the configuration files as needed, in `config/enso/*.php`

### Thanks

Built with Laravel Enso 4.x which is crafted on Laravel 7, Bulma, Vuejs and:

[Vue Router](https://router.vuejs.org/en), [Vuex](https://vuex.vuejs.org/en/), [Axios](https://github.com/axios/axios),
[Font awesome 5](https://fontawesome.com), [Animate.css](https://daneden.github.io/animate.css/), 
[Bulma-Extensions](https://wikiki.github.io/bulma-extensions/overview), [Driver.js](https://kamranahmed.info/driver.js/),
[Chart.js](http://chartjs.org), [Flatpickr](https://chmln.github.io/flatpickr/), 

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
