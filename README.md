# Laravel 11.x simple blog

The purpose of this repository is to implement a simple blog system using Laravel 11:

## Basic Features

- User registration/authentication: Users should be able to register an account and log in. Handle authentication using Laravel’s built-in capabilities.
- CRUD operations for blog posts: Users should be able to Create, Read, Update, and Delete their own blog posts. Each blog post should include a title, body content, creation date and time, and the author’s name.
- Comments: Users should be able to post comments on blog posts. Users can only post a comment if they are logged in, and they may only delete their own comments.
- Categories: Users should have the ability to assign categories to their posts. A post can have many categories and a category can belong to many posts (Many-to-Many relationship).
- Search function: Users should be able to conduct a keyword search on blog posts (post title and body)

## Some screenshots

![Simple Blog](https://i.ibb.co/R7C9wL9/Screenshot-2024-11-27-at-15-08-57.png)

![Simple Blog](https://i.ibb.co/jLFn97W/Screenshot-2024-11-27-at-15-09-22.png)

![Simple Blog](https://i.ibb.co/8Mg6WLN/Screenshot-2024-11-27-at-15-09-46.png)

## Installation

To create your development environment [follow these instructions](https://laravel.com/docs/11.x/installation#local-installation-using-herd).

Setting up your development environment on your local machine:
```bash
$ git clone https://github.com/sandza201/simple-blog.git
$ cd simple-blog
$ cp .env.example .env
```

Now open [http://simple-blog.test](http://simple-blog.test).

## Before starting
You need to run the migrations with the seeds :
```bash
$ php artisan migrate:fresh --seed
```

This will create a new user that you can use to sign in :
```yml
email: test@example.com
password: password
```

And then, compile the assets :
```bash
$ npm run dev
```
