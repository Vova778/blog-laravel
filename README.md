## Blog Project using Laravel 10 and Bootstrap 5

This is a project aimed at simulating a blog using Laravel 8+ framework and Bootstrap 4/5 for the frontend. The project implements various features including user authentication, CRUD operations for articles, comments, pagination, and more.

## Features Implemented

- **Main Page:**
  - Displays the 10 latest articles.
  - Pagination for more than 10 articles.

- **Sidebar:**
  - Displays the top 5 articles with the most comments.

- **Article Viewing Page:**
  - Users can view individual articles.
  - Users can leave comments on articles.

- **Admin Panel:**
  - Login page for admin access.
  - Dashboard for managing posts, with pagination similar to the main page.
  - CRUD operations for articles, protected by authentication.

- **Validation:**
  - Server-side validation for all forms.
  - Display of validation errors for user feedback.

- **Additional Features:**
  - Resourceful controllers for CRUD operations.
  - Seeders for populating the database with fake data.
  - Labeling new articles and removing labels older than 3 days using a custom command.
