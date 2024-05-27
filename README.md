<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About InsightBlog

Technology Stack:

1. Backend Framework: Laravel
2. Authentication: Laravel Breeze
3. Frontend: Blade Template Engine
4. Database: MySQL
5. Email Services: Mailtrap

Dependencies:

1. XAMPP
• XAMPP provides an easy-to-install Apache-MySQL-PHP-PhpMyAdmin environment that is suitable for
running the Laravel project locally. Download and install XAMPP from the official website: [XAMPP
Official Website
](https://www.apachefriends.org/index.html)
2. PHP Version:
• Ensure that a compatible version of PHP is installed (recommended: PHP 7.2 or higher) to run the Laravel
project. In the Git Bash terminal, run the following command: php -v

3. Composer:
• Ensure that Composer is installed to manage the project's dependencies. If Composer is not already
installed, you can download it from [Composer's official website](https://getcomposer.org/).

4. Node.js
• Ensure that Node.js and npm are installed on the local machine. You can download and install [Node.js
from the official website:](https://nodejs.org/en)

6. Laravel Framework:
• The project utilizes Laravel framework. Ensure that the local environment has Laravel installed. You can
install Laravel using Composer by running the following command: composer global require
laravel/installer

7. Git
• Install Git to clone the project repository and manage version control. Git can be downloaded and
installed from the [official Git website:](https://git-scm.com/)

Environment Setup:

1. Clone the Project Repository:
• Clone the project repository from the current version control system (Git) to your local machine.

2. Install Dependencies:
• Navigate to the project directory and run the following command to install the project dependencies
using Composer by running the following command: composer install

3. Migrate Database:
• Run the database migrations to create the necessary tables in the database by running the following
command: php artisan migrate

4. Install Node.js Packages:
• Navigate to the project directory using git and run the following command to install the necessary Node.js
packages: npm install

5. Run Laravel Mix:
• The project uses Laravel Mix for asset compilation (e.g., SCSS, JavaScript), run the following command
to compile assets: npm run dev

7. Start the Development Server:
• To start the development server, run the following command: php artisan serve

Pre- requisites before using the web app.

1. Sign Up for Mailtrap Email Testing
• Go to the [Mailtrap website](https://mailtrap.io/) and sign up for an account.
• To retrieve your Mailtrap username and password navigate to email testing and click on inbox

In the application code, locate the .env file and add the following email configuration variables:
1. MAIL_MAILER=smtp
2. MAIL_HOST=sandbox.smtp.mailtrap.io
3. MAIL_PORT=2525
4. MAIL_USERNAME=<Your Mailtrap username>
5. MAIL_PASSWORD=<Your Mailtrap password>
6. MAIL_ENCRYPTION=tls

Replace the existing values for email username and password with your Mailtrap credentials. These are the specific credentials provided by Mailtrap when you create an inbox, and they are not the same as your regular email login details.

2.Granting Admin Privileges 
- Login to mySql database via phpmyadmin.
• Locate and select InsightBlog.
• Locate the user in the "users" table.
• Set the "is_admin" value to true for the user to grant admin privileges

User Guide

User Registration
1.	Accessing the Registration Page
-   To begin using the blog platform, users can navigate to the registration page by clicking on the "Register" link in the top navigation bar.
3.	Filling Out the Registration Form
-	In the registration form, users need to provide their full name, email address and password.Once all required fields are filled out, users can click the "Register" button to submit the form.
4.	Validation and Confirmation
-	The system validates the form to ensure that the email address provided is unique and the password meets the necessary security criteria. Upon successful validation, users receive a confirmation email indicating that their registration was successful including confirmation link. 
5.	Logging In
-	Registered users can login using their register email address and password to access their account.
6.	Password Recovery
-	If users forget their password, they should use the "Forgot Password" link on the login page to initiate the password recovery process.

Using the Blog Platform
1.	Accessing the Blog Dashboard
-	Upon logging in, users are directed to the blog dashboard where they can create, browse blog posts.
2.	Creating a Blog Post
-	To create a new blog post, users can click on the "Create Post" button, which will open a form for adding the post title, content.
3.	Editing and Deleting Posts
-   Author(admin) can view a list of their existing blog posts and have the option to edit or delete any of them as needed.
4.	Viewing and Commenting on Posts
-	Reader and author(admin) can browse through published posts, read them, and leave comments to engage in discussions with other readers or the author.
5.	Managing Comments
-	For readers and admin, there is only one option to manage comments, deleting them.
6.	User Roles and Permissions
•	The blog platform has two user roles (admin and reader) with varying permissions for managing content.
