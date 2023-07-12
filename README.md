## Liberu Genealogy - Open Source Family Tree Software - Laravel 10 / PHP 8.2 Backend
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

## Demostration website
Visit our demonstration website at https://www.familytree365.com to get a firsthand experience of our platform. By registering a free account, you can enjoy a no-cost and obligation-free demo.

Our demo provides you with the opportunity to explore the features and functionalities of our platform in a risk-free environment. Sign up and immerse yourself in the world of family trees without any financial commitment.

During the demo, you can test various aspects of our platform, including creating and editing family trees, adding family members, exploring genealogical records, and discovering the intuitive interface designed to enhance your genealogy research experience.

Take advantage of this opportunity to see how our platform can assist you in preserving your family's heritage and connecting generations.

Register now for a free account and enjoy the demo with no charges or obligations. Visit https://www.familytree365.com and begin your genealogical journey today!
<!--/h-->

### Installation steps

1. Begin by downloading the project using the command `git clone https://github.com/laravel-liberu/genealogy.git`

2. Next, make a copy of the `.env.example` file and rename it as `.env`. Open the `.env` file and update the necessary details according to your specific configuration.

3. Run the command `composer install` to install the project dependencies. If you are using Windows, you may need to run `composer install --ignore-platform-reqs` instead.

4. Generate an application key by executing the command `php artisan key:generate`

5. Launch the project by running `php artisan serve`.

6. To set up the database tables and seed them with initial data, run the command `php artisan migrate --seed`

7. If needed, you can customize the configuration files located in config/enso/*.php according to your requirements.

8. For certain configurations, you may need to set up sanctum stateful domains and session domain in the `.env` file. Additionally, add your domains to the `config/cors.php` file.

9. Lastly, follow the installation steps for the client side by visiting the link provided: https://github.com/liberu-ui/genealogy.

10. Launch the site and log into the project using the following credentials:

User: `admin@familytree365.com`
Password: `password`


By following these steps, you will successfully download the project, configure the necessary environment variables, install dependencies, generate a key, run the project, migrate the database, customize configurations if needed, and set up the client-side application. You can then log in to the project with the specified user credentials and begin exploring its features.

<!--/h-->
## Example data

* Prior to proceeding, ensure that the command "php artisan queue:work" is running. This command is essential for the proper functioning of the queue system.

* It is important to use the root database user for this process. Make sure you are logged in with the appropriate credentials to avoid any potential issues.

* To begin, register a new user and then proceed to log in to the system. This step is necessary to access and utilize the full functionality of the platform.

* Once logged in, navigate to the "gedcom/import" section. Here, you can upload the desired GEDCOM file for processing. We recommend using the following URL: https://github.com/laravel-liberu/public-gedcoms/blob/master/files/royal92.ged

* By following these steps, you can seamlessly run the queue, ensure the correct database user is utilized, register and log in with a new user account, and successfully import the specified GEDCOM file.

Note: Please ensure that you have a stable internet connection during the process to facilitate a smooth experience.

<!--/h-->

### Contributions

We warmly welcome new contributions from the community! We believe in the power of collaboration and appreciate any involvement you'd like to have in improving our project. Whether you prefer submitting pull requests with code enhancements or raising issues to help us identify areas of improvement, we value your participation.

If you have code changes or feature enhancements to propose, pull requests are a fantastic way to share your ideas with us. We encourage you to fork the project, make the necessary modifications, and submit a pull request for our review. Our team will diligently review your changes and work together with you to ensure the highest quality outcome.

However, we understand that not everyone is comfortable with submitting code directly. If you come across any issues or have suggestions for improvement, we greatly appreciate your input. By raising an issue, you provide valuable insights that help us identify and address potential problems or opportunities for growth.

Whether through pull requests or issues, your contributions play a vital role in making our project even better. We believe in fostering an inclusive and collaborative environment where everyone's ideas are valued and respected.

We look forward to your involvement, and together, we can create a vibrant and thriving project. Thank you for considering contributing to our community!
<!--/h-->
### License

This project is licensed under the MIT license, granting you the freedom to utilize it for both personal and commercial projects. The MIT license ensures that you have the flexibility to adapt, modify, and distribute the project as per your needs. Feel free to incorporate it into your own ventures, whether they are personal endeavors or part of a larger commercial undertaking. The permissive nature of the MIT license empowers you to leverage this project without any unnecessary restrictions. Enjoy the benefits of this open and accessible license as you embark on your creative and entrepreneurial pursuits.
<!--/h-->
