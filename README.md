# Personal Task Manager

Project Code: WST21-PM-2026-SF

Student Name: [Your Name]

Course & Year: [Course & Year]

Database Used: SQLite

Features:
- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status

## Overview
This project is a simple personal task manager built with Laravel. It allows users to add tasks, view all saved tasks, update task details, delete items, and set task status as Pending or Completed.

## Tech Stack
- Laravel 12
- SQLite database
- Blade templates
- MVC structure: Route → Controller → Model → Database → Blade

## Local Setup
1. Clone the repository.
2. Run `composer install`.
3. Create a local environment file if needed: `cp .env.example .env`.
4. Generate the application key: `php artisan key:generate`.
5. Run database migrations: `php artisan migrate`.
6. Start the app: `php artisan serve`.
7. Open the app in your browser at `http://127.0.0.1:8000/tasks`.

## Features Implemented
- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status

## Notes
This project uses SQLite for simplicity and local development. The app is designed around the required Laravel CRUD flow and Blade views.
