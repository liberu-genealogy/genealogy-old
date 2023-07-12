## Genealogy - Open Source Family Tree Software - Laravel 10 backend
 ![Latest Stable Version](https://img.shields.io/github/release/laravel-liberu/genealogy.svg) 
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/laravel-liberu/genealogy/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/laravel-liberu/genealogy/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/laravel-liberu/genealogy/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![StyleCI](https://github.styleci.io/repos/135390590/shield?branch=master)](https://github.styleci.io/repos/135390590)
[![CodeFactor](https://www.codefactor.io/repository/github/familytree365/genealogy/badge/master)](https://www.codefactor.io/repository/github/familytree365/genealogy/overview/master)
[![codebeat badge](https://codebeat.co/badges/911f9e33-212a-4dfa-a860-751cdbbacff7)](https://codebeat.co/projects/github-com-modulargenealogy-genealogy-master)
[![CircleCI](https://circleci.com/gh/laravel-liberu/genealogy.svg?style=svg)](https://circleci.com/gh/laravel-liberu/genealogy)

<!--/h-->
### Description
Liberu Genealogy is an innovative open source project built using Laravel 10 and PHP 8.2, aimed at revolutionizing the field of genealogy and family history research. Our project combines the power of Laravel's robust framework with the latest features and advancements offered by PHP 8.2 to create a cutting-edge platform for exploring and preserving ancestral heritage.

At the core of our project is a sophisticated genealogy website built on Laravel 10, providing users with a seamless and intuitive experience as they delve into their family lineage. Leveraging Laravel's elegant syntax and comprehensive set of tools, we have developed a feature-rich application that enables users to create, manage, and explore their family trees with ease.

Moreover, the open source nature of our project encourages collaboration and innovation within the genealogy community. Developers can leverage Laravel 10 and PHP 8.2 to extend the functionality of Liberu Genealogy, contribute enhancements, and customize the platform to suit their specific requirements. We actively support a thriving community of developers who utilize our open source code to create complementary tools and applications, fostering an ecosystem of continuous improvement and expansion.

Creating your own family tree has never been easier. With our platform, you have two convenient options to get started. You can import data in various standard formats or manually enter the information yourself.

To ensure seamless integration with existing family tree databases and records, we provide robust API support. Our API allows you to import and export Gedcom data and DNA matching results effortlessly. Additionally, we are constantly innovating and will be introducing Smart Matching soon, which will enable you to connect easily with resources on other servers, expanding your research possibilities.

We prioritize the security and privacy of your data. Rest assured that all your information is securely stored on our server and will never be shared without your explicit permission. We understand the sensitivity of personal data, and protecting your privacy is our utmost concern.

Our platform features user-friendly data tables that support comprehensive CRUD operations, empowering you to manage your family tree information with ease. Whether you need to create, read, update, or delete data entries, our intuitive interface ensures a seamless experience.

Customization is key, and our forms are designed to be easily modified to fit your specific needs. Tailor your family tree to reflect the unique nuances and details of your lineage. Our flexible forms empower you to capture the rich history and connections that make your family story truly special.

To get started install the backend located at https://github.com/laravel-liberu/genealogy, then you can find the client application at https://github.com/liberu-ui/genealogy. Download and explore the user-friendly interface and unleash the power of creating and discovering your family's heritage with ease.

Download our software today and embark on an enriching journey of tracing your roots and discovering the stories that connect generations.
<!--/h-->
## Demo
https://www.familytree365.com - register a free account, and try the demo with no charge or obligation. 
<!--/h-->

### Installation Steps

1. Download the project with `git clone https://github.com/laravel-liberu/genealogy.git`

2. Copy .env.example to .env and edit details

3. `composer install` or on Windows you need to use `composer install --ignore-platform-reqs`

4. `php artisan key:generate`

5. `php artisan serve` 

6. Run `php artisan migrate --seed`

7. (optional) Setup the configuration files as needed, in `config/enso/*.php`

8. (maybe required) Setup sanctum stateful domains and session domain in `.env` and add your domains to `config/cors.php`

9. Follow installation steps for client side (https://github.com/liberu-ui/genealogy) and launch the site and log into the project with user: `admin@familytree365.com`, password: `password`


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

Licensed under MIT, use for any personal or commercial project.
<!--/h-->
