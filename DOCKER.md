## Installation using Docker

Development environment requirements :
- [Docker](https://www.docker.com)
- [Docker Compose](https://docs.docker.com/compose/install/)

Setting up your development environment on your local machine :
```
$ git clone https://github.com/modularsoftware/genealogy.git
$ cd genealogy
$ cp .env.example .env
$ docker-compose run --rm --no-deps genealogy-server composer install
$ docker-compose run --rm --no-deps genealogy-server php artisan key:generate
$ docker run --rm -it -v $(pwd):/app -w /app node npm install
$ docker-compose up -d
```

Now you can access the application via [http://localhost](http://localhost).

**There is no need to run ```php artisan serve```. PHP is already running in a dedicated container.**

## Before starting
You need to run the migrations with the seeds :
```
$ docker-compose run --rm genealogy-server php artisan migrate --seed
```

This will create a new user that you can use to sign in :
```
Email : admin@example.net
Password : password
```

And then, compile the assets :
```
$ docker run --rm -it -v $(pwd):/app -w /app node npm run dev
