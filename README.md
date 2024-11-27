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

## How to Use

### 1. **User Registration and Login**
   - **Registration**: Upon visiting the website, click on the **Register** button. Fill out the registration form with your details (name, email, password) and submit.
   - **Login**: Once registered, you can log in with your email and password by clicking the **Login** button.

### 2. **CRUD Operations for Blog Posts**
   - After logging in, you will be redirected to your **Dashboard**. From here, you can manage your blog posts.
   - **Create a Post**: Navigate to **Posts** in the dashboard navigation and click on the **New Post** button to add a new blog post. You'll need to provide a title, body content, and select any relevant categories.
   - **Read Posts**: You can view all posts in the **Feed** section. Each post displays the title, author name, creation date, and body content.
   - **Edit a Post**: On your posts list, click the **Edit** button next to a post to modify it.
   - **Delete a Post**: You can delete a post by clicking the **Delete** button.

### 3. **Comments**
   - **Post a Comment**: If you're logged in, you can post a comment on any blog post. Simply scroll to the comment section at the bottom of the post and type your comment.
   - **Delete Your Comment**: You can delete only your own comments by clicking the **Delete** button next to your comment.

### 4. **Categories**
   - **Assign Categories**: While creating or editing a post, you can select one or more categories for your post from the available categories.
   - **View by Category**: You can filter blog posts by categories in **Feed** by selecting a category from the topbar by clicking on a category name.

### 5. **Search**
   - **Search Posts**: To search for posts by title or body, use the search bar located at the top of the feed page. Type in a keyword and hit enter to see matching results.

---

### Additional Features

- **Pagination**: Blog posts are paginated for easy browsing. You can navigate between pages using the **Next** and **Previous** links.
- **Validation**: All form inputs are validated to ensure correct data is entered (e.g., required fields, valid email format).
- **Responsive Design**: The application is fully responsive and works well on both desktop and mobile devices.
