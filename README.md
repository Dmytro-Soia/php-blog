# PHP-BLOG

 Simple blogging platform built with PHP and SQLite. Users can create and edit their posts and manage their personal page. Admins have additional privileges to manage users posts.

## Features

- User authentication (_login, registration, logout_)
- Create and edit blog posts
- User profile management (_update username, bio, and profile picture_)
- Admin panel for managing admins roles
- Flash messages for user feedback

## Technology used

- Languages: 

    - PHP 
        - Backend logic and database interaction
    - HTML/CSS
        - Frontend structure and styling.
    
- Database

    - SQLite
        - Database for storing user and users posts.

- Libraries

    - Laravel Pint
        - Code formatting
    - HTML Purifier
        - HTML input sanitizer
    - Tiny MCE
        - WYSIWYG text editor

## Setup

### 1. Install Composer dependency manager on [UNIX-like](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos) or [Windows](https://getcomposer.org/doc/00-intro.md#installation-windows):

```bash
sudo dnf install php composer
```

### 2. Clone the repository:

```bash
git@github.com:Dmytro-Soia/php-blog.git
```
### 3. Move to the project directory:

```bash
cd php-blog
```

### 4. Install the dependencies:

```bash
sudo dnf install php
npm install sqlite3@5.1.7
composer install
```

### 5. Start the PHP development server:

```bash
php -S localhost:8080 -t public
```