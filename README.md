## Blog Project using Laravel 10 and Bootstrap 5

This is a project aimed at simulating a blog using Laravel framework and Bootstrap 4/5 for the frontend. The project implements various features including user authentication, CRUD operations for posts, comments, pagination, and more.

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/Vova778/blog-laravel.git
    ```

2. **Navigate to the project directory:**

    ```bash
    cd blog-laravel
    ```

3. **Install PHP dependencies:**

    ```bash
    composer install
    ```

4. **Install JavaScript dependencies:**

    ```bash
    npm install
    ```

5. **Create a copy of the `.env.example` file and rename it to `.env`. Configure the database and mail settings accordingly.**

6. **Generate application key:**

    ```bash
    php artisan key:generate
    ```

7. **Create a symbolic link from the public storage folder to the storage folder:**

    ```bash
    php artisan storage:link
    ```

8. **Run database migrations:**

    ```bash
    php artisan migrate
    ```

9. **Optionally, seed the database with fake data:**

    ```bash
    php artisan db:seed
    ```



## Usage

1. **Serve the application:**

    ```bash
    php artisan serve
    ```
2. **Compile the frontend assets for development:**

    ```bash
    npm run dev
    ```

3. **Start the scheduler to enable task scheduling:**

    ```bash
    php artisan schedule:work
    ```
4. **Access the application in your browser:**

    ```
    http://localhost:8000
    ```

5. **Login to the admin panel using the following credentials:**

   - **Email:** test@example.com
   - **Password:** password

6. **Explore and interact with the blog functionalities.**

## Features Implemented

- **Main Page:**
  - Displays the 10 latest posts.
  - Pagination for more than 10 posts.

- **Sidebar:**
  - Displays the top 5 posts with the most comments.

- **Article Viewing Page:**
  - Users can view individual posts.
  - Users can leave comments on posts.

- **Admin Panel:**
  - Login page for admin access.
  - Dashboard for managing posts, with pagination similar to the main page.
  - CRUD operations for posts, protected by authentication.

- **Validation:**
  - Server-side validation for all forms.
  - Display of validation errors for user feedback.

- **Additional Features:**
  - Resourceful controllers for CRUD operations.
  - Seeders to fill the database with fake data.
  - Logging changes during article editing/creation.
  - Email notifications to admins for new comments on their articles.
  - Labeling new posts and removing labels older than 3 days using a custom command.
